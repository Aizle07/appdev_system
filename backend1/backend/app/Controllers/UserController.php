<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\Restful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\VendorModel;
use App\Models\ProductModel;

class UserController extends ResourceController
{
    use  ResponseTrait;
    public function index()
    {
        //
    }
    //admin

    public function getUserData(){
        $userModel = new UserModel();
        $users = $userModel->findAll();
        return $this->respond($users, 200);
      }

      public function getVendorData(){
        $vendorModel = new VendorModel();
        $vendor = $vendorModel->findAll();
        return $this->respond($vendor, 200);
      }

      public function User()
      {
          $cart = new UserModel();
          $data = $cart->findAll();
          return $this->respond($data, 200);
      }

      //vendor

      public function register()
      {
          $userModel = new UserModel();
          $vendorModel = new VendorModel();
      
          // Generate a verification token
          $token = $this->verification(50);
      
          // Data for the Users table
          $userData = [
              'username' => $this->request->getVar('username'),
              'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
              'token' => $token,
              'status' => 'active',
              'role' => 'user',
          ];
      
          // Save user data
          $userSaved = $userModel->save($userData);
      
          if ($userSaved) {
              // Data for the Vendors table
              $vendorData = [
                  'user_id' => $userModel->insertID(),
                  'vendor_name' => $this->request->getVar('vendor_name'),
                  'contact_email' => $this->request->getVar('contact_email'),
                  'contact_number' => $this->request->getVar('contact_number'),
              ];
      
              // Save vendor data
              $vendorSaved = $vendorModel->save($vendorData);
      
              if ($vendorSaved) {
                  return $this->respond(['msg' => 'okay', 'token' => $token]);
              } else {
                  // If vendor data saving fails, you may want to handle it accordingly.
                  return $this->respond(['msg' => 'failed to save vendor data']);
              }
          } else {
              // If user data saving fails, you may want to handle it accordingly.
              return $this->respond(['msg' => 'failed to save user data']);
          }
      }
      

      public function verification($length){
      
      
          $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
           return substr(str_shuffle($str_result), 0, $length);
        }


        public function login()
        {
            $user = new UserModel();
            $vendorModel = new VendorModel(); // Assuming you have a VendorModel

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // Check if the entered credentials are for an admin
    if ($username === 'admin' && $password === 'pass123') {
        // You can customize the response for admin login
        return $this->respond(['msg' => 'okay', 'token' => 'admin_token', 'user_id' => 'admin_id', 'username' => 'admin', 'vendor_id' => 'admin_vendor_id']);
    }

            $data = $user->where('username', $username)->first();

            if ($data) {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);

                if ($authenticatePassword) {
                    // Retrieve vendor_id based on user_id
                    $vendorData = $vendorModel->where('user_id', $data['id'])->first();

                    if ($vendorData) {
                        $vendor_id = $vendorData['vendor_id'];
                        return $this->respond(['msg' => 'okay', 'token' => $data['token'], 'user_id' => $data['id'], 'username' => $data['username'], 'vendor_id' => $vendor_id]);
                    } else {
                        return $this->respond(['msg' => 'Vendor data not found for the user'], 200);
                    }
                } else {
                    return $this->respond(['msg' => 'error'], 200);
                }
            }

            return $this->respond(['msg' => 'User not found'], 200);
        }

          public function logout()
          {
              $session = session();
              $session->destroy();
    
              return redirect()->to('/')->with('success', 'Logout successful');
          }


          //

          //update status
        // In your Controller
// Assuming this is in your VendorController.php
public function approved($vendorId)
{
    // Validate $vendorId as needed

    $vendorModel = new VendorModel();
    $vendor = $vendorModel->find($vendorId);

    if ($vendor) {
        // Update the status to 'Approved'
        $vendor['status'] = 'Approved';
        $updated = $vendorModel->update($vendorId, $vendor);

        if ($updated) {
            return $this->response->setJSON(['msg' => 'Vendor approved successfully']);
        } else {
            return $this->response->setJSON(['msg' => 'Failed to update vendor status']);
        }
    } else {
        return $this->response->setJSON(['msg' => 'Vendor not found']);
    }
}
          public function addProduct()
          {
              $productModel = new ProductModel();
              
              // Retrieve the uploaded image file, if any
              $uploadedFile = $this->request->getFile('prod_image');
              
              // Check if a file was uploaded
              if ($uploadedFile && $uploadedFile->isValid()) {
                  // File was uploaded, proceed with processing
                  $imageName = $uploadedFile->getName();
              
                  // Initialize $data with product data
                  $data = [
                      'vendor_id' => $this->request->getVar('vendor_id'),
                      'product_name' => $this->request->getVar('product_name'),
                      'prod_image' => base_url() . $this->handleImageUpload($uploadedFile, $imageName),
                      'type' => $this->request->getVar('type'),
                      'price' => $this->request->getVar('price'),
                  ];
              
                  // Insert the product data
                  $product = $productModel->insert($data);
              
                  if ($product) {
                      return $this->respond(['msg' => 'Product added successfully']);
                  } else {
                      return $this->respond(['msg' => 'Failed to add product']);
                  }
              } else {
                  // No file was uploaded or an issue occurred
                  return $this->respond(['msg' => 'No valid file uploaded'], 400);
              }
          }
          
          public function handleImageUpload($image, $imageName)
          {
              $image->move(ROOTPATH . 'public/uploads/', $imageName);
              return 'uploads/' . $imageName;
          }

          //update products
          public function updateProduct($productId)
          {
              $productModel = new ProductModel();
          
              // Retrieve the uploaded image file, if any
              $uploadedFile = $this->request->getFile('prod_image');
          
              // Check if a file was uploaded
              if ($uploadedFile && $uploadedFile->isValid()) {
                  // File was uploaded, proceed with processing
                  $images = $uploadedFile->getName();
          
                  // Initialize $data with other data for the discussion
                  $data = [
                      'product_name' => $this->request->getVar('product_name'),
                      'prod_image'   => base_url() . $this->handleImageUpload($uploadedFile, $images),
                      'type'         => $this->request->getVar('type'),
                      'price'        => $this->request->getVar('price'),
                  ];
          
                  // Update the product data based on product_id
                  $updatedProduct = $productModel->update($productId, $data);
          
                  if ($updatedProduct) {
                      return $this->respond(['msg' => 'Product updated successfully']);
                  } else {
                      return $this->respond(['msg' => 'Failed to update product']);
                  }
              } else {
                  // No file was uploaded or an issue occurred
                  return $this->respond(['msg' => 'No valid file uploaded'], 400);
              }
          }
          

          public function showProductsByVendorId($vendor_id)
          {
              // Get the vendor_id from session storage
              // $vendor_id = session()->get('user_id');

              // Create an instance of the ProductModel
              $productModel = new ProductModel();

              // Fetch products by vendor_id
              $products = $productModel->where('vendor_id', $vendor_id)->findAll();

              // Check if products are available
              if (empty($products)) {
                  return $this->failNotFound('No products found for the vendor.');
              }

              // Return the products as a JSON response
              return $this->respond($products, 200);
          }
          
          public function getVendorsData($vendor_id)
          {
              $vendorModel = new VendorModel();
              $vendor = $vendorModel->where('vendor_id', $vendor_id)->findAll();
          
              if (empty($vendor)) {
                  return $this->failNotFound('No vendor found for the specified vendor_id.');
              }

              // Count the products for the given vendor_id
                $productModel = new ProductModel();
                $productCount = $productModel->where('vendor_id', $vendor_id)->countAllResults();

                // Add the product count to the vendor data
                $vendor['product_count'] = $productCount;
          
              return $this->respond($vendor, 200);
          }
          
          // product viewing

          public function getProductsWithVendorInfo()
        {
            $productModel = new ProductModel();
            $vendorModel = new VendorModel();

            $products = $productModel->join('vendors', 'vendors.vendor_id = products.vendor_id')
                                    ->select('products.product_id, products.product_name, products.prod_image, products.type, products.price, vendors.vendor_name, vendors.vendor_id')
                                    ->where('vendors.status', 'Approved')
                                    ->findAll();

            return $this->respond($products);
        }
    
}
