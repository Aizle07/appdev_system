if(!self.define){let e,s={};const n=(n,i)=>(n=new URL(n+".js",i).href,s[n]||new Promise((s=>{if("document"in self){const e=document.createElement("script");e.src=n,e.onload=s,document.head.appendChild(e)}else e=n,importScripts(n),s()})).then((()=>{let e=s[n];if(!e)throw new Error(`Module ${n} didn’t register its module`);return e})));self.define=(i,o)=>{const r=e||("document"in self?document.currentScript.src:"")||location.href;if(s[r])return;let l={};const t=e=>n(e,r),f={module:{uri:r},exports:l,require:t};s[r]=Promise.all(i.map((e=>f[e]||t(e)))).then((e=>(o(...e),l)))}}define(["./workbox-6567b62a"],(function(e){"use strict";e.setCacheNameDetails({prefix:"frontend1"}),self.addEventListener("message",(e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()})),e.precacheAndRoute([{url:"/css/about.af1134df.css",revision:null},{url:"/css/app.4514489d.css",revision:null},{url:"/css/chunk-vendors.46e960bb.css",revision:null},{url:"/fonts/materialdesignicons-webfont.21f691f0.ttf",revision:null},{url:"/fonts/materialdesignicons-webfont.54b0f60d.woff2",revision:null},{url:"/fonts/materialdesignicons-webfont.5d875350.eot",revision:null},{url:"/fonts/materialdesignicons-webfont.d671cbf6.woff",revision:null},{url:"/img/logo.6cff5c8a.svg",revision:null},{url:"/index.html",revision:"31300187add3ceeab5ccee44444c457c"},{url:"/js/about.6beef4f3.js",revision:null},{url:"/js/app.930c156f.js",revision:null},{url:"/js/chunk-vendors.cb1eeaec.js",revision:null},{url:"/js/webfontloader.dc9f6d3b.js",revision:null},{url:"/manifest.json",revision:"69e1e20526df01ccefede49066f1028d"},{url:"/robots.txt",revision:"735ab4f94fbcd57074377afca324c813"}],{})}));
//# sourceMappingURL=service-worker.js.map
