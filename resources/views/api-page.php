
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <style>
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight .gh {
  color: #999999;
}
.highlight .sr {
  color: #f6aa11;
}
.highlight .go {
  color: #888888;
}
.highlight .gp {
  color: #555555;
}
.highlight .gs {
}
.highlight .gu {
  color: #aaaaaa;
}
.highlight .nb {
  color: #f6aa11;
}
.highlight .cm {
  color: #75715e;
}
.highlight .cp {
  color: #75715e;
}
.highlight .c1 {
  color: #75715e;
}
.highlight .cs {
  color: #75715e;
}
.highlight .c, .highlight .cd {
  color: #75715e;
}
.highlight .err {
  color: #960050;
}
.highlight .gr {
  color: #960050;
}
.highlight .gt {
  color: #960050;
}
.highlight .gd {
  color: #49483e;
}
.highlight .gi {
  color: #49483e;
}
.highlight .ge {
  color: #49483e;
}
.highlight .kc {
  color: #66d9ef;
}
.highlight .kd {
  color: #66d9ef;
}
.highlight .kr {
  color: #66d9ef;
}
.highlight .no {
  color: #66d9ef;
}
.highlight .kt {
  color: #66d9ef;
}
.highlight .mf {
  color: #ae81ff;
}
.highlight .mh {
  color: #ae81ff;
}
.highlight .il {
  color: #ae81ff;
}
.highlight .mi {
  color: #ae81ff;
}
.highlight .mo {
  color: #ae81ff;
}
.highlight .m, .highlight .mb, .highlight .mx {
  color: #ae81ff;
}
.highlight .sc {
  color: #ae81ff;
}
.highlight .se {
  color: #ae81ff;
}
.highlight .ss {
  color: #ae81ff;
}
.highlight .sd {
  color: #e6db74;
}
.highlight .s2 {
  color: #e6db74;
}
.highlight .sb {
  color: #e6db74;
}
.highlight .sh {
  color: #e6db74;
}
.highlight .si {
  color: #e6db74;
}
.highlight .sx {
  color: #e6db74;
}
.highlight .s1 {
  color: #e6db74;
}
.highlight .s {
  color: #e6db74;
}
.highlight .na {
  color: #a6e22e;
}
.highlight .nc {
  color: #a6e22e;
}
.highlight .nd {
  color: #a6e22e;
}
.highlight .ne {
  color: #a6e22e;
}
.highlight .nf {
  color: #a6e22e;
}
.highlight .vc {
  color: #ffffff;
}
.highlight .nn {
  color: #ffffff;
}
.highlight .nl {
  color: #ffffff;
}
.highlight .ni {
  color: #ffffff;
}
.highlight .bp {
  color: #ffffff;
}
.highlight .vg {
  color: #ffffff;
}
.highlight .vi {
  color: #ffffff;
}
.highlight .nv {
  color: #ffffff;
}
.highlight .w {
  color: #ffffff;
}
.highlight {
  color: #ffffff;
}
.highlight .n, .highlight .py, .highlight .nx {
  color: #ffffff;
}
.highlight .ow {
  color: #f92672;
}
.highlight .nt {
  color: #f92672;
}
.highlight .k, .highlight .kv {
  color: #f92672;
}
.highlight .kn {
  color: #f92672;
}
.highlight .kp {
  color: #f92672;
}
.highlight .o {
  color: #f92672;
}
    </style>
    <link href="stylesheets/screen-2f560b49.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print-5b092a43.css" rel="stylesheet" media="print" />
      <script src="javascripts/all-c5541673.js"></script>
  </head>

  <body class="index" data-languages="[&quot;javascript (Angular)&quot;]">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar-cad8cdcb.png" alt="Navbar" />
      </span>
    </a>
    <div class="toc-wrapper">
      <img src="https://storage.googleapis.com/openkitchen_cdn/ok_landing_page/logo/openkitchen_icon_text.svg" class="logo" alt="Openkitchen icon text" />
        <div class="lang-selector">
              <a href="#" data-language-name="javascript (Angular)">javascript (Angular)</a>
        </div>
        <div class="search">
          <input type="text" class="search" id="input-search" placeholder="Search">
        </div>
        <ul class="search-results"></ul>
      <ul id="toc" class="toc-list-h1">
          <li>
            <a href="#introduction" class="toc-h1 toc-link" data-title="Introduction">Introduction</a>
          </li>
          <li>
            <a href="#authentication" class="toc-h1 toc-link" data-title="Authentication">Authentication</a>
          </li>
          <li>
            <a href="#first-open-kitchen-endpoints" class="toc-h1 toc-link" data-title="First Open Kitchen endpoints">First Open Kitchen endpoints</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-restaurant-amp-dependencies" class="toc-h2 toc-link" data-title="Get Restaurant &amp; Dependencies">Get Restaurant &amp; Dependencies</a>
                  </li>
                  <li>
                    <a href="#assign-dishes" class="toc-h2 toc-link" data-title="Assign Dishes">Assign Dishes</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#restaurants" class="toc-h1 toc-link" data-title="Restaurants">Restaurants</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-restaurants" class="toc-h2 toc-link" data-title="Get Restaurants">Get Restaurants</a>
                  </li>
                  <li>
                    <a href="#get-a-restaurant" class="toc-h2 toc-link" data-title="Get a Restaurant">Get a Restaurant</a>
                  </li>
                  <li>
                    <a href="#create-restaurant" class="toc-h2 toc-link" data-title="Create Restaurant">Create Restaurant</a>
                  </li>
                  <li>
                    <a href="#update-a-restaurant" class="toc-h2 toc-link" data-title="Update a Restaurant">Update a Restaurant</a>
                  </li>
                  <li>
                    <a href="#delete-restaurant" class="toc-h2 toc-link" data-title="Delete Restaurant">Delete Restaurant</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#inventories" class="toc-h1 toc-link" data-title="Inventories">Inventories</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-inventories" class="toc-h2 toc-link" data-title="Get Inventories">Get Inventories</a>
                  </li>
                  <li>
                    <a href="#get-inventory" class="toc-h2 toc-link" data-title="Get Inventory">Get Inventory</a>
                  </li>
                  <li>
                    <a href="#create-inventory" class="toc-h2 toc-link" data-title="Create Inventory">Create Inventory</a>
                  </li>
                  <li>
                    <a href="#update-inventory" class="toc-h2 toc-link" data-title="Update Inventory">Update Inventory</a>
                  </li>
                  <li>
                    <a href="#delete-inventory" class="toc-h2 toc-link" data-title="Delete Inventory">Delete Inventory</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#inventoryitems" class="toc-h1 toc-link" data-title="InventoryItems">InventoryItems</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-inventory-items" class="toc-h2 toc-link" data-title="Get Inventory Items">Get Inventory Items</a>
                  </li>
                  <li>
                    <a href="#get-a-inventory-item" class="toc-h2 toc-link" data-title="Get a Inventory Item">Get a Inventory Item</a>
                  </li>
                  <li>
                    <a href="#create-inventory-item" class="toc-h2 toc-link" data-title="Create Inventory Item">Create Inventory Item</a>
                  </li>
                  <li>
                    <a href="#update-inventory-item" class="toc-h2 toc-link" data-title="Update Inventory Item">Update Inventory Item</a>
                  </li>
                  <li>
                    <a href="#delete-inventory-item" class="toc-h2 toc-link" data-title="Delete Inventory Item">Delete Inventory Item</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#products" class="toc-h1 toc-link" data-title="Products">Products</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-products" class="toc-h2 toc-link" data-title="Get Products">Get Products</a>
                  </li>
                  <li>
                    <a href="#get-product" class="toc-h2 toc-link" data-title="Get Product">Get Product</a>
                  </li>
                  <li>
                    <a href="#create-product" class="toc-h2 toc-link" data-title="Create Product">Create Product</a>
                  </li>
                  <li>
                    <a href="#update-product" class="toc-h2 toc-link" data-title="Update Product">Update Product</a>
                  </li>
                  <li>
                    <a href="#delete-product" class="toc-h2 toc-link" data-title="Delete Product">Delete Product</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#dishes" class="toc-h1 toc-link" data-title="Dishes">Dishes</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-dishes" class="toc-h2 toc-link" data-title="Get Dishes">Get Dishes</a>
                  </li>
                  <li>
                    <a href="#get-dish" class="toc-h2 toc-link" data-title="Get Dish">Get Dish</a>
                  </li>
                  <li>
                    <a href="#update-dish" class="toc-h2 toc-link" data-title="Update Dish">Update Dish</a>
                  </li>
                  <li>
                    <a href="#delete-dish" class="toc-h2 toc-link" data-title="Delete Dish">Delete Dish</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#woks" class="toc-h1 toc-link" data-title="Woks">Woks</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-woks" class="toc-h2 toc-link" data-title="Get Woks">Get Woks</a>
                  </li>
                  <li>
                    <a href="#get-a-wok" class="toc-h2 toc-link" data-title="Get a Wok">Get a Wok</a>
                  </li>
                  <li>
                    <a href="#update-wok" class="toc-h2 toc-link" data-title="Update wok">Update wok</a>
                  </li>
                  <li>
                    <a href="#delete-wok" class="toc-h2 toc-link" data-title="Delete wok">Delete wok</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#dispensers" class="toc-h1 toc-link" data-title="Dispensers">Dispensers</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-dispensers" class="toc-h2 toc-link" data-title="Get Dispensers">Get Dispensers</a>
                  </li>
                  <li>
                    <a href="#get-a-dispenser" class="toc-h2 toc-link" data-title="Get a Dispenser">Get a Dispenser</a>
                  </li>
                  <li>
                    <a href="#create-a-dispenser" class="toc-h2 toc-link" data-title="Create a Dispenser">Create a Dispenser</a>
                  </li>
                  <li>
                    <a href="#update-a-dispenser" class="toc-h2 toc-link" data-title="Update a Dispenser">Update a Dispenser</a>
                  </li>
                  <li>
                    <a href="#delete-dispenser" class="toc-h2 toc-link" data-title="Delete Dispenser">Delete Dispenser</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#sauce-bags" class="toc-h1 toc-link" data-title="Sauce Bags">Sauce Bags</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-sauce-bags" class="toc-h2 toc-link" data-title="Get Sauce Bags">Get Sauce Bags</a>
                  </li>
                  <li>
                    <a href="#get-sauce-bag" class="toc-h2 toc-link" data-title="Get Sauce Bag">Get Sauce Bag</a>
                  </li>
                  <li>
                    <a href="#create-sauce-bag" class="toc-h2 toc-link" data-title="Create Sauce Bag">Create Sauce Bag</a>
                  </li>
                  <li>
                    <a href="#update-sauce-bag" class="toc-h2 toc-link" data-title="Update Sauce Bag">Update Sauce Bag</a>
                  </li>
                  <li>
                    <a href="#delete-sauce-bag" class="toc-h2 toc-link" data-title="Delete Sauce Bag">Delete Sauce Bag</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#shopping-carts" class="toc-h1 toc-link" data-title="Shopping Carts">Shopping Carts</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-shopping-carts" class="toc-h2 toc-link" data-title="Get Shopping Carts">Get Shopping Carts</a>
                  </li>
                  <li>
                    <a href="#get-shopping-cart" class="toc-h2 toc-link" data-title="Get Shopping Cart">Get Shopping Cart</a>
                  </li>
                  <li>
                    <a href="#create-shopping-cart" class="toc-h2 toc-link" data-title="Create Shopping Cart">Create Shopping Cart</a>
                  </li>
                  <li>
                    <a href="#update-shopping-cart" class="toc-h2 toc-link" data-title="Update Shopping Cart">Update Shopping Cart</a>
                  </li>
                  <li>
                    <a href="#delete-shopping-cart" class="toc-h2 toc-link" data-title="Delete Shopping Cart">Delete Shopping Cart</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#query-helpers" class="toc-h1 toc-link" data-title="Query Helpers">Query Helpers</a>
          </li>
          <li>
            <a href="#errors" class="toc-h1 toc-link" data-title="Errors">Errors</a>
          </li>
          <li>
            <a href="#models" class="toc-h1 toc-link" data-title="Models">Models</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#chef" class="toc-h2 toc-link" data-title="Chef">Chef</a>
                  </li>
                  <li>
                    <a href="#client" class="toc-h2 toc-link" data-title="Client">Client</a>
                  </li>
                  <li>
                    <a href="#credit" class="toc-h2 toc-link" data-title="Credit">Credit</a>
                  </li>
                  <li>
                    <a href="#coupon" class="toc-h2 toc-link" data-title="Coupon">Coupon</a>
                  </li>
                  <li>
                    <a href="#dish" class="toc-h2 toc-link" data-title="Dish">Dish</a>
                  </li>
                  <li>
                    <a href="#dispenser" class="toc-h2 toc-link" data-title="Dispenser">Dispenser</a>
                  </li>
                  <li>
                    <a href="#inventory" class="toc-h2 toc-link" data-title="Inventory">Inventory</a>
                  </li>
                  <li>
                    <a href="#inventory-item" class="toc-h2 toc-link" data-title="Inventory Item">Inventory Item</a>
                  </li>
                  <li>
                    <a href="#kushki-card" class="toc-h2 toc-link" data-title="Kushki Card">Kushki Card</a>
                  </li>
                  <li>
                    <a href="#kushki-ticket" class="toc-h2 toc-link" data-title="Kushki Ticket">Kushki Ticket</a>
                  </li>
                  <li>
                    <a href="#order" class="toc-h2 toc-link" data-title="Order">Order</a>
                  </li>
                  <li>
                    <a href="#order-item" class="toc-h2 toc-link" data-title="Order Item">Order Item</a>
                  </li>
                  <li>
                    <a href="#product" class="toc-h2 toc-link" data-title="Product">Product</a>
                  </li>
                  <li>
                    <a href="#restaurant" class="toc-h2 toc-link" data-title="Restaurant">Restaurant</a>
                  </li>
                  <li>
                    <a href="#sauce-bag" class="toc-h2 toc-link" data-title="Sauce Bag">Sauce Bag</a>
                  </li>
                  <li>
                    <a href="#shopping-cart" class="toc-h2 toc-link" data-title="Shopping Cart">Shopping Cart</a>
                  </li>
                  <li>
                    <a href="#shopping-cart-item" class="toc-h2 toc-link" data-title="Shopping Cart Item">Shopping Cart Item</a>
                  </li>
                  <li>
                    <a href="#user" class="toc-h2 toc-link" data-title="User">User</a>
                  </li>
                  <li>
                    <a href="#wok" class="toc-h2 toc-link" data-title="Wok">Wok</a>
                  </li>
              </ul>
          </li>
      </ul>
        <ul class="toc-footer">
            <li><a href='https://github.com/lord/slate'>Powered by Slate</a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
        <h1 id='introduction'>Introduction</h1>
<p>Welcome to the ChefSurf &amp; OpenKitchen API. You can use our API documentation to access all our endpoints that are being used across the ChefSurf | Satee | OpenKitchen applications, which can get information on all the products, orders, dishes in the queue, etc.</p>

<p>At this point we will only write documentation for JavasCript and then we will add documentation for Python and PHP. You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.</p>

<p><img src="https://storage.googleapis.com/cs-bucket-space/assets/logo/new/logo_caviar.svg"
     alt="ChefSurf logo"
     style="width: 300px; float: left; margin-top: 38px;" /></p>

<p><img src="https://storage.googleapis.com/openkitchen_cdn/satee/logosatee.png"
     alt="Satee logo"
     style="width: 200px; float: left; margin-top: 10px;" /></p>

<!-- This example API documentation page was created with [Slate](https://github.com/lord/slate). Feel free to edit it and use it as a base for your own API's documentation. -->
<h1 id='authentication'>Authentication</h1>
<blockquote>
<p>To authorize, use this code:</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">signIn</span><span class="p">(</span><span class="nx">email</span><span class="p">:</span> <span class="nx">string</span><span class="p">,</span> <span class="nx">password</span><span class="p">:</span> <span class="nx">string</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/api/auth/token`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">email</span><span class="p">,</span>
    <span class="nx">password</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"token"</span><span class="p">:</span><span class="w"> </span><span class="s2">"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOiI1ZGQ5NzkwMjEyMjU2ZjEwZTgzYmI5MzciLCJpZGVudGl0eSI6IjVkZDk3OTAyMTIyNTZmMTBlODNiYjkzNyIsInJvbGUiOiJjaGVmIiwib3duZXIiOiI1ZGQ5NzkwMTEyMjU2ZjEwZTgzYmI5MzIiLCJjbGllbnQiOm51bGwsIm93bmVyVHlwZSI6InJlc3RhdXJhbnQiLCJlbWFpbCI6ImNoZWYxQHNhdGVlLmRldiIsImNoZWYiOiI1ZGQ5NzkwMjEyMjU2ZjEwZTgzYmI5MzgiLCJyZXN0YXVyYW50IjoiNWRkOTc5MDIxMjI1NmYxMGU4M2JiOTM0IiwiaWF0IjoxNTc3NjU1OTU2fQ.pnCOJ6TfP3Xjll9znrEiEY458kwJqtylOtIsruKH5FA"</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>Make sure to replace <code>{{token_here}}</code> with your API Token.</p>
</blockquote>

<p>All the endpoints uses JWT tokens to allow access to the API. If you have a restaurant and you have access to the Satee Admin panel. you can obtain the token from inside the Web application <a href="https://satee.com/admin">Satee Web Application</a>.</p>

<p>Satee | Node ChefSurf | OpenKitchen expects for the API Token to be included in all API requests to the server in a header that looks like the following:</p>

<p><code>Authorization: JWT {{token_here}}</code></p>

<aside class="notice">
You must replace <code>{{token_here}}</code> with your personal API Token.
</aside>
<h1 id='first-open-kitchen-endpoints'>First Open Kitchen endpoints</h1><h2 id='get-restaurant-amp-dependencies'>Get Restaurant &amp; Dependencies</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">getDependencies</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/api/open-kitchen`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb936"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb938"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb93a"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb93c"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790312256f10e83bb93e"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Demo restaurant"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"restaurant.com"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb933"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.212Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:58.081Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="s2">"inventoryItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">200</span><span class="p">,</span><span class="w">
            </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
            </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lett"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9790312256f10e83bb940"</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb941"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Organic lettuce"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="s2">"woks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
            </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c2"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"XsUbu9o"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_0"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.123Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.123Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves the restaurant and it&#39;s dependencies. </p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET  https://node.chefsurf.io/open-kitchen</code></p>
<h3 id='headers'>Headers</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Content</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>Authorization</td>
<td>JWT {{auth_token}}</td>
<td>Your token should be placed in the request, otherwise it will return a 403 error.</td>
</tr>
</tbody></table>

<!-- ### Query Parameters

Parameter | Default | Description
--------- | ------- | -----------
include_cats | false | If set to true, the result will also include cats.
available | true | If set to false, the result will include kittens that have already been adopted. -->
<h2 id='assign-dishes'>Assign Dishes</h2>
<blockquote>
<p>POST - https://node.chefsurf.io/open-kitchen/assign/dishes</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">assignDishes</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/api/open-kitchen/assign/dishes`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"pending"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
                </span><span class="s2">"added"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
                </span><span class="s2">"failed"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
                </span><span class="s2">"additions"</span><span class="p">:</span><span class="w"> </span><span class="p">[]</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"dishName"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"priority"</span><span class="p">:</span><span class="w"> </span><span class="s2">"normal"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"queue"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sortOrder"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"simplifiedId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"3d79-3d7c"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"cookingTime"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e09a4f5ab7c8b2691551468"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"orderItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e091e65f79a1c3227d93d7c"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"customer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e091e65f79a1c3227d93d73"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-30T07:19:17.541Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-30T07:19:17.541Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint assign dishes to the queue. The queue contains dishes splitted individually so the Raspberry Pi pulls those and assign them to the woks.</p>

<aside class="warning">This endpoint will not longer be supported soon, it will be replaced with another endpoint.</aside>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/open-kitchen/assign/dishes</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<p>The parameters are applied to the OrderItem&#39;s properties.</p>

<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_date</td>
<td>apply a date condition to the query. i.e <strong>2019-12-22</strong></td>
</tr>
<tr>
<td>where_time</td>
<td>apply a time condition to the query i.e <strong>13:00:00</strong></td>
</tr>
<tr>
<td>where_status</td>
<td>apply a status condition to the query i.e <strong>placed</strong></td>
</tr>
<tr>
<td>where_priority</td>
<td>apply a priority condition to the query i.e <strong>urgent</strong></td>
</tr>
<tr>
<td>where_customer</td>
<td>apply a customer._id condition to the query i.e <strong>5e091e65f79a1c3227d93d73</strong></td>
</tr>
</tbody></table>
<h1 id='restaurants'>Restaurants</h1><h2 id='get-restaurants'>Get Restaurants</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/restaurants'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestRestaurants</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9790212256f10e83bb936"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"5dd9790212256f10e83bb938"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"5dd9790212256f10e83bb93a"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"5dd9790212256f10e83bb93c"</span><span class="p">,</span><span class="w">
                </span><span class="s2">"5dd9790312256f10e83bb93e"</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Satee"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"defaultDeliveryGuy"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"comesate.com"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb933"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.212Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:58.081Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of restaurants that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/restaurants</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_name</td>
<td>apply a name condition to the query. i.e <strong>Satee</strong></td>
</tr>
<tr>
<td>where_domain</td>
<td>apply a domain condition to the query i.e <strong>comesate.com</strong></td>
</tr>
</tbody></table>
<h2 id='get-a-restaurant'>Get a Restaurant</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/restaurants/:restaurant_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/restaurants'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestRestaurant</span><span class="p">(</span><span class="nx">restaurant_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">restaurant_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb936"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb938"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb93a"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790212256f10e83bb93c"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"5dd9790312256f10e83bb93e"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Satee"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"defaultDeliveryGuy"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"comesate.com"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb933"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.212Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:58.081Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one restaurant by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/restaurants/:restaurant_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-restaurant'>Create Restaurant</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/restaurants</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/restaurants'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createRestaurant</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New restaurant"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e0ec1eb8fbe5c18ac3f72e3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"newrestaurant.dev"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T04:24:11.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T04:24:11.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new restaurant. if you create a new restaurant you need to be aware that you need to make sure to add a domain that is not taken already. otherwise it will throw an exception.</p>

<p>Chefs are created in a different endpoint, and they will be added automatically to the Restaurant record that it belongs to.</p>
<h2 id='update-a-restaurant'>Update a Restaurant</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/restaurants/restaurant_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/restaurants'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateRestaurant</span><span class="p">(</span><span class="nx">restaurant_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">restaurant_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">

  </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New restaurant - updated"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"newrestaurant.app"</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New restaurant - updated"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e0ec1eb8fbe5c18ac3f72e3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"newrestaurant.app"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T10:20:00.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T04:24:11.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the restaurant, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/restaurants/restaurant_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>logo</td>
<td>String</td>
<td>You can modify the logo url.</td>
</tr>
<tr>
<td>background</td>
<td>String</td>
<td>You can modify the background url.</td>
</tr>
<tr>
<td>location</td>
<td>Object</td>
<td>You can add a Google location which includes the address, coordinates, etc.</td>
</tr>
<tr>
<td>name</td>
<td>String</td>
<td>You can change the name of the restaurant that is visible to the customers.</td>
</tr>
<tr>
<td>automatedKitchen</td>
<td>Boolean</td>
<td>Enable/Disable the automatedKitchen feature ( OpenKitchen )</td>
</tr>
<tr>
<td>deliveryAvailable</td>
<td>Boolean</td>
<td>Enable/Disable delivery to address feature</td>
</tr>
<tr>
<td>cashPaymentAvailable</td>
<td>Boolean</td>
<td>Enable/Disable cash payments feature</td>
</tr>
<tr>
<td>creditCardPaymentAvailable</td>
<td>Boolean</td>
<td>Enable/Disable credit card payments feature</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>chefs</td>
<td>Array</td>
<td>Array of Chef Objects.</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>user</td>
<td>ObjectID</td>
<td>User Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-restaurant'>Delete Restaurant</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/restaurants/restaurant_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/restaurants'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {String} restaurant_id
*/</span>
<span class="nx">deleteRestaurant</span><span class="p">(</span><span class="nx">restaurant_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">restaurant_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"chefs"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"logo"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"background"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New restaurant"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"automatedKitchen"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deliveryAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pickUpAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cashPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"creditCardPaymentAvailable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e0ec1eb8fbe5c18ac3f72e3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"domain"</span><span class="p">:</span><span class="w"> </span><span class="s2">"newrestaurant.app"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T06:24:06.699Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T04:24:11.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T06:24:06.698Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a restaurant that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific restaurant.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/restaurants/restaurant_id</code></p>
<h1 id='inventories'>Inventories</h1><h2 id='get-inventories'>Get Inventories</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventories'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestInventories</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="s2">"current"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of inventories that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/inventories</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_restaurant</td>
<td>apply a restaurant condition to the query. i.e <strong>5dd9790212256f10e83bb934</strong></td>
</tr>
<tr>
<td>where_current</td>
<td>apply a current condition to the query i.e <strong>true</strong></td>
</tr>
</tbody></table>
<h2 id='get-inventory'>Get Inventory</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/inventories/:inventory_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventories'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestInventory</span><span class="p">(</span><span class="nx">inventory_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">inventory_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"current"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one inventory by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/inventories/:inventory_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-inventory'>Create Inventory</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/inventories</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventories'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createInventory</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"current"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you try to create a second inventory you will get a JSON like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new inventory. if you create a new inventory you need to be aware that you need to make sure you don&#39;t have one already. otherwise it will throw an exception.</p>
<h2 id='update-inventory'>Update Inventory</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/inventories/inventory_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventories'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateWok</span><span class="p">(</span><span class="nx">inventory_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">inventory_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
  </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"current"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T03:26:51.972Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the inventory, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/inventories/inventory_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>maxCapacity</td>
<td>Number</td>
<td>it determinates the maximum quantity inside an inventory item.</td>
</tr>
<tr>
<td>sendAlertsOnLowInventory</td>
<td>Boolean</td>
<td>it determinates if we need to notify the staff about low quantities in the inventory item records.</td>
</tr>
<tr>
<td>alertOnQuantity</td>
<td>Number</td>
<td>it determinates the number to check if the sendAlertsOnLowInventory is enabled.</td>
</tr>
<tr>
<td>current</td>
<td>Boolean</td>
<td>it determinates if the inventory created is the current one ( at this point it&#39;s not being used).</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>restaurant</td>
<td>Array</td>
<td>Restaurant Object ID</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-inventory'>Delete Inventory</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/inventories/inventory_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventories'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
*/</span>
<span class="nx">deleteInventory</span><span class="p">(</span><span class="nx">inventory_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">inventory_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"maxCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sendAlertsOnLowInventory"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"alertOnQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"current"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T03:33:43.983Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.213Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T03:33:43.979Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a inventory that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific inventory.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/inventories/inventory_id</code></p>
<h1 id='inventoryitems'>InventoryItems</h1><h2 id='get-inventory-items'>Get Inventory Items</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventory-items'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestInventoryItems</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">200</span><span class="p">,</span><span class="w">
            </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
            </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"arugula"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9790312256f10e83bb940"</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb941"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Organic arugula"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of inventory Items that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/inventory-items</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_category</td>
<td>apply a category condition to the query. i.e <strong>ingredient</strong></td>
</tr>
<tr>
<td>where_type</td>
<td>apply a type condition to the query i.e <strong>protein</strong></td>
</tr>
</tbody></table>
<h2 id='get-a-inventory-item'>Get a Inventory Item</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/inventory-items/:item_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventory-items'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestInventoryItem</span><span class="p">(</span><span class="nx">item_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">item_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">200</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
        </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"arugula"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9790312256f10e83bb940"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb941"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Organic arugula"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:22:59.215Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one inventory item by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/inventory-items/:item_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-inventory-item'>Create Inventory Item</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/inventory-items</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventory-items'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createInventoryItem</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">200</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
        </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"new_ing1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e117fb6fa6f3a02580f84cc"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"new inventory item"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T06:18:30.418Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T06:18:30.418Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new inventory Item. if you create a new inventoryItem you need to be aware that you need to make sure to add a referenceId that is not already taken. otherwise it will throw an exception.</p>
<h2 id='update-inventory-item'>Update Inventory Item</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/inventory-items/item_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventory-items'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateInventoryItem</span><span class="p">(</span><span class="nx">item_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">item_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid"</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">200</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
        </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e117fb6fa6f3a02580f84cc"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T06:28:04.065Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T06:18:30.418Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the inventory Item, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/inventory-items/item_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>category</td>
<td>String</td>
<td>You can modify the category to any of these values [&#39;ingredient&#39;, &#39;drink&#39;, &#39;dessert&#39;].</td>
</tr>
<tr>
<td>type</td>
<td>String</td>
<td>You can modify the type to any of these values [&#39;base&#39;, &#39;veggie&#39;, &#39;dressing&#39;, &#39;protein&#39;, &#39;extra&#39;, &#39;drink&#39;, &#39;dessert&#39;, &#39;topping&#39;, &#39;premium&#39;, &#39;none&#39;].</td>
</tr>
<tr>
<td>title</td>
<td>String</td>
<td>You can modify the title.</td>
</tr>
<tr>
<td>description</td>
<td>String</td>
<td>You can modify the description.</td>
</tr>
<tr>
<td>onStock</td>
<td>Boolean</td>
<td>You can Enable/Disable the inventory item to be in stock.</td>
</tr>
<tr>
<td>stockQuantity</td>
<td>Number</td>
<td>You can modify the actual quantity in stock.</td>
</tr>
<tr>
<td>onProduction</td>
<td>Boolean</td>
<td>You can Enable/Disable the inventory item to be in production.</td>
</tr>
<tr>
<td>productionQuantity</td>
<td>Number</td>
<td>You can modify the quantity that is in production.</td>
</tr>
<tr>
<td>maxProductionCapacity</td>
<td>Number</td>
<td>You can modify the max production capacity (it cannot be lower than the actual production quantity).</td>
</tr>
<tr>
<td>referenceId</td>
<td>String</td>
<td>You can modify the referenceId (this value has to be unique)</td>
</tr>
<tr>
<td>price</td>
<td>Number</td>
<td>You can modify the price of the inventory item.</td>
</tr>
<tr>
<td>measurement</td>
<td>String</td>
<td>You can modify the measurement of the inventory item to any of these values [&#39;gram&#39;, &#39;kilogram&#39;, &#39;oz&#39;, &#39;piece&#39;, &#39;none&#39;].</td>
</tr>
<tr>
<td>measurementUnit</td>
<td>Number</td>
<td>You can modify the quantity of the measurement set for the inventory item.</td>
</tr>
<tr>
<td>totalMeasurement</td>
<td>String</td>
<td>You can modify the total measurement of the inventory item to any of these values [&#39;gram&#39;, &#39;kilogram&#39;, &#39;oz&#39;, &#39;piece&#39;, &#39;none&#39;]</td>
</tr>
<tr>
<td>totalMeasurementUnits</td>
<td>Number</td>
<td>You can modify the quantity of the total measurement set for the inventory item.</td>
</tr>
<tr>
<td>priceForRawItem</td>
<td>Number</td>
<td>You can set the price of the raw item ( cost )</td>
</tr>
<tr>
<td>pictures</td>
<td>Array</td>
<td>Array of Attachment Objects</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>restaurant</td>
<td>ObjectID</td>
<td>Restaurant Object ID</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>inventory</td>
<td>ObjectID</td>
<td>Inventory Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-inventory-item'>Delete Inventory Item</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/inventory-items/item_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/inventory-items'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {string} item_id
*/</span>
<span class="nx">deleteInventoryItem</span><span class="p">(</span><span class="nx">item_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">item_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ingredient"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onStock"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"stockQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"onProduction"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"productionQuantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"referenceId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"maxProductionCapacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">499</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"none"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"totalMeasurementUnits"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priceForRawItem"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"pictures"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118bbf11a8820b7ea66ef8"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventory"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:10:25.099Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:09:51.415Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:10:25.097Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a inventoryItem that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific inventoryItem.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/inventory-items/item_id</code></p>
<h1 id='products'>Products</h1><h2 id='get-products'>Get Products</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/products'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestProducts</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"availability"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"monday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"tuesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"wednesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"thursday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"friday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"saturday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="s2">"sunday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grains_bowl_category"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"gram"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="mi">700</span><span class="p">,</span><span class="w">
            </span><span class="s2">"calories"</span><span class="p">:</span><span class="w"> </span><span class="mi">580</span><span class="p">,</span><span class="w">
            </span><span class="s2">"attachments"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9797f12256f10e83bb9c7"</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
                </span><span class="err">...</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"drinks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9840a64bebe12632fb79e"</span><span class="p">,</span><span class="w">
                </span><span class="err">...</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"desserts"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="s2">"5dd9840a64bebe12632fb7a1"</span><span class="p">,</span><span class="w">
                </span><span class="err">...</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9c8"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb933"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
            </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"organic arugula,</span><span class="se">\n</span><span class="s2">        warm quinoa,</span><span class="se">\n</span><span class="s2">        cilantro,</span><span class="se">\n</span><span class="s2">        shredded cabbage,</span><span class="se">\n</span><span class="s2">        spicy sunflower seeds,</span><span class="se">\n</span><span class="s2">        tomato,</span><span class="se">\n</span><span class="s2">        tortilla chips,</span><span class="se">\n</span><span class="s2">        goat cheese,</span><span class="se">\n</span><span class="s2">        roasted corn + peppers,</span><span class="se">\n</span><span class="s2">        lime cilantro jalapeno vinaigrette"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"position"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T19:10:02.600Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:25:03.203Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of products that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/products</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_title</td>
<td>apply a title condition to the query. i.e <strong>Elote Bowl</strong></td>
</tr>
<tr>
<td>like_title</td>
<td>apply a title condition to the query where it finds any possible match not the exact title, i.e <strong>Elote</strong>, that will bring Elote Bowl in the request response.</td>
</tr>
<tr>
<td>where_price</td>
<td>apply a price condition to the query i.e <strong>12000</strong></td>
</tr>
<tr>
<td>where_category</td>
<td>apply a category condition to the query i.e <strong>greens_grains_bowl_category</strong></td>
</tr>
<tr>
<td>where_availability.monday</td>
<td>apply a availability condition to specific day to the query i.e <strong>true</strong></td>
</tr>
</tbody></table>
<h2 id='get-product'>Get Product</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/products/:product_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/products'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestProduct</span><span class="p">(</span><span class="nx">product_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">product_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"availability"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"monday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"tuesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"wednesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"thursday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"friday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"saturday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sunday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grains_bowl_category"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"gram"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="mi">700</span><span class="p">,</span><span class="w">
        </span><span class="s2">"calories"</span><span class="p">:</span><span class="w"> </span><span class="mi">580</span><span class="p">,</span><span class="w">
        </span><span class="s2">"attachments"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c7"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"drinks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb79e"</span><span class="p">,</span><span class="w">
           </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"desserts"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb7a1"</span><span class="p">,</span><span class="w">
            </span><span class="err">....</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9c8"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb933"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"organic arugula,</span><span class="se">\n</span><span class="s2">        warm quinoa,</span><span class="se">\n</span><span class="s2">        cilantro,</span><span class="se">\n</span><span class="s2">        shredded cabbage,</span><span class="se">\n</span><span class="s2">        spicy sunflower seeds,</span><span class="se">\n</span><span class="s2">        tomato,</span><span class="se">\n</span><span class="s2">        tortilla chips,</span><span class="se">\n</span><span class="s2">        goat cheese,</span><span class="se">\n</span><span class="s2">        roasted corn + peppers,</span><span class="se">\n</span><span class="s2">        lime cilantro jalapeno vinaigrette"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"position"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T19:10:02.600Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:25:03.203Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one product by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/products/:product_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-product'>Create Product</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/products</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/products'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createProduct</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"availability"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"monday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"tuesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"wednesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"thursday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"friday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"saturday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sunday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grains_bowl_category"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"gram"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="mi">700</span><span class="p">,</span><span class="w">
        </span><span class="s2">"calories"</span><span class="p">:</span><span class="w"> </span><span class="mi">580</span><span class="p">,</span><span class="w">
        </span><span class="s2">"attachments"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c7"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"drinks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb79e"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"desserts"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb7a1"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e1b5b97ab6f9f1a03679d05"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"organic arugula,</span><span class="se">\n</span><span class="s2">        warm quinoa,</span><span class="se">\n</span><span class="s2">        cilantro,</span><span class="se">\n</span><span class="s2">        shredded cabbage,</span><span class="se">\n</span><span class="s2">        spicy sunflower seeds,</span><span class="se">\n</span><span class="s2">        tomato,</span><span class="se">\n</span><span class="s2">        tortilla chips,</span><span class="se">\n</span><span class="s2">        goat cheese,</span><span class="se">\n</span><span class="s2">        roasted corn + peppers,</span><span class="se">\n</span><span class="s2">        lime cilantro jalapeno vinaigrette"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"position"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdBy"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:47:03.314Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:47:03.314Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new product. if you create a new product you need to be aware that you need to make sure to only pass the fillable properties. otherwise it will throw an exception or it will be overriden by the authUser information.</p>
<h2 id='update-product'>Update Product</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/products/product_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/products'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateProduct</span><span class="p">(</span><span class="nx">product_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">product_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl Updated"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">15000</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"availability"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"monday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"tuesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"wednesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"thursday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"friday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"saturday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sunday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grains_bowl_category"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"gram"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="mi">700</span><span class="p">,</span><span class="w">
        </span><span class="s2">"calories"</span><span class="p">:</span><span class="w"> </span><span class="mi">580</span><span class="p">,</span><span class="w">
        </span><span class="s2">"attachments"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c7"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"drinks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb79e"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"desserts"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb7a1"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e1b5b97ab6f9f1a03679d05"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl Updated"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">15000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"organic arugula,</span><span class="se">\n</span><span class="s2">        warm quinoa,</span><span class="se">\n</span><span class="s2">        cilantro,</span><span class="se">\n</span><span class="s2">        shredded cabbage,</span><span class="se">\n</span><span class="s2">        spicy sunflower seeds,</span><span class="se">\n</span><span class="s2">        tomato,</span><span class="se">\n</span><span class="s2">        tortilla chips,</span><span class="se">\n</span><span class="s2">        goat cheese,</span><span class="se">\n</span><span class="s2">        roasted corn + peppers,</span><span class="se">\n</span><span class="s2">        lime cilantro jalapeno vinaigrette"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"position"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdBy"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:49:41.358Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:47:03.314Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the product, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/products/product_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>category</td>
<td>String</td>
<td>You can modify the category the product belongs to.</td>
</tr>
<tr>
<td>price</td>
<td>Number</td>
<td>you can modify the price of the product.</td>
</tr>
<tr>
<td>description</td>
<td>String</td>
<td>You can modify the description of the product.</td>
</tr>
<tr>
<td>position</td>
<td>Numner</td>
<td>You can change the order of the product, sorting is based on this property.</td>
</tr>
<tr>
<td>measurement</td>
<td>String</td>
<td>You can specify the measurement of the product content, it could be any of this values [&#39;gram&#39;, &#39;kilogram&#39;, &#39;oz&#39;, &#39;piece&#39;, &#39;none&#39;].</td>
</tr>
<tr>
<td>measurementUnit</td>
<td>Number</td>
<td>You can specify the units depending of the measurement selected.</td>
</tr>
<tr>
<td>calories</td>
<td>Number</td>
<td>You can specify the number of calories the dish contains ( without the aditional toppings the client might add to it ).</td>
</tr>
<tr>
<td>attachments</td>
<td>Array<ObjectID></td>
<td>You can add upto 5 pictures you want for the product.</td>
</tr>
<tr>
<td>availability</td>
<td>Map<Boolean></td>
<td>You can specify which days of the week, this product will be visible.</td>
</tr>
<tr>
<td>ingredients</td>
<td>Array<ObjectID></td>
<td>You can add all the ingredients needed for the product and specify all the details on the ProductIngredient model.</td>
</tr>
<tr>
<td>drinks</td>
<td>Array<ObjectID></td>
<td>You can add all the drinks needed for the product and specify all the details on the ProductIngredient model.</td>
</tr>
<tr>
<td>desserts</td>
<td>Array<ObjectID></td>
<td>You can add all the desserts needed for the product and specify all the details on the ProductIngredient model.</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key.</td>
</tr>
<tr>
<td>restaurant</td>
<td>ObjectID</td>
<td>Restaurant Object ID.</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID.</td>
</tr>
<tr>
<td>createdBy</td>
<td>ObjectID</td>
<td>User Object ID.</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-product'>Delete Product</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/products/product_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/products'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {String} product_id
*/</span>
<span class="nx">deleteProduct</span><span class="p">(</span><span class="nx">product_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">product_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
      </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"availability"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"monday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"tuesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"wednesday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"thursday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"friday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"saturday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sunday"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"category"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grains_bowl_category"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurement"</span><span class="p">:</span><span class="w"> </span><span class="s2">"gram"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"measurementUnit"</span><span class="p">:</span><span class="w"> </span><span class="mi">700</span><span class="p">,</span><span class="w">
        </span><span class="s2">"calories"</span><span class="p">:</span><span class="w"> </span><span class="mi">580</span><span class="p">,</span><span class="w">
        </span><span class="s2">"attachments"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c7"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"drinks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb79e"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"desserts"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5dd9840a64bebe12632fb7a1"</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e1b5b97ab6f9f1a03679d05"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl Updated"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">15000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"organic arugula,</span><span class="se">\n</span><span class="s2">        warm quinoa,</span><span class="se">\n</span><span class="s2">        cilantro,</span><span class="se">\n</span><span class="s2">        shredded cabbage,</span><span class="se">\n</span><span class="s2">        spicy sunflower seeds,</span><span class="se">\n</span><span class="s2">        tomato,</span><span class="se">\n</span><span class="s2">        tortilla chips,</span><span class="se">\n</span><span class="s2">        goat cheese,</span><span class="se">\n</span><span class="s2">        roasted corn + peppers,</span><span class="se">\n</span><span class="s2">        lime cilantro jalapeno vinaigrette"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"position"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdBy"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb937"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:49:41.358Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-12T17:47:03.314Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-03T06:24:06.698Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a product that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific product.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/products/product_id</code></p>
<h1 id='dishes'>Dishes</h1><h2 id='get-dishes'>Get Dishes</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dishes'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestQueueDishes</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="s2">"pending"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="s2">"ingredientId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9840a64bebe12632fb79c"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"protein"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"protein"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Proteinas"</span><span class="p">,</span><span class="w">
                        </span><span class="s2">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
                        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
                    </span><span class="p">},</span><span class="w">
                    </span><span class="err">...</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="s2">"added"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="err">...</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="s2">"failed"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
                </span><span class="s2">"additions"</span><span class="p">:</span><span class="w"> </span><span class="p">[]</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="s2">"dishName"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"priority"</span><span class="p">:</span><span class="w"> </span><span class="s2">"normal"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"queue"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"sortOrder"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"simplifiedId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"8d16-8d17"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"cookingTime"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067f54056e410a8e2f2746"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"orderItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067e7575f5160a6fcb8d17"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"customer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-29T19:59:17.260Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-27T22:01:56.797Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of dishes that inside the queue. The Raspberry pi needs this list to know which dishes are in which line so we can assign them to woks and start collecting ingredients from dispensers if needed. all those steps are based on the information provided inside ingredients./ and we update the status of each dish when we move them from one state to another.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/open-kitchen/dishes</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_status</td>
<td>apply a status condition to the query. i.e <strong>queue</strong></td>
</tr>
<tr>
<td>wherein_status</td>
<td>apply a list of statuses condition to the query i.e <strong>[&#39;failed&#39;, &#39;cancelled&#39;]</td>
</tr>
<tr>
<td>where_priority</td>
<td>apply a priority condition to the query i.e <strong>urgent</strong></td>
</tr>
<tr>
<td>where_cookingTime</td>
<td>apply a cooking time condition to the query i.e <strong>2</strong>.</td>
</tr>
</tbody></table>
<h2 id='get-dish'>Get Dish</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/dishes/:queue_dish_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dishes'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestQueueDish</span><span class="p">(</span><span class="nx">queue_dish_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">queue_dish_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"pending"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"ingredientId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"base"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"base"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bases"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                        </span><span class="p">{</span><span class="w">
                            </span><span class="s2">"optionId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9cd"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Warm Quinoa"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"mandatory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb949"</span><span class="w">
                        </span><span class="p">},</span><span class="w">
                        </span><span class="p">{</span><span class="w">
                            </span><span class="s2">"optionId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9cc"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Organic arugula"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"mandatory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb941"</span><span class="w">
                        </span><span class="p">},</span><span class="w">
                        </span><span class="p">{</span><span class="w">
                            </span><span class="s2">"optionId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9cb"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Shredded Kale"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"mandatory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb947"</span><span class="w">
                        </span><span class="p">},</span><span class="w">
                        </span><span class="p">{</span><span class="w">
                            </span><span class="s2">"optionId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9ca"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Organic Wild Rice"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"mandatory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb945"</span><span class="w">
                        </span><span class="p">}</span><span class="w">
                    </span><span class="p">],</span><span class="w">
                    </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
                </span><span class="p">},</span><span class="w">
                </span><span class="err">...</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"added"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">],</span><span class="w">
            </span><span class="s2">"failed"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">],</span><span class="w">
            </span><span class="s2">"additions"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">]</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"dishName"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priority"</span><span class="p">:</span><span class="w"> </span><span class="s2">"normal"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"queue"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sortOrder"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"simplifiedId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"8d16-8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cookingTime"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067f54056e410a8e2f2746"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"orderItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067e7575f5160a6fcb8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"customer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-29T19:59:17.260Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-27T22:01:56.797Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one queue dish by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/dishes/:queue_dish_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='update-dish'>Update Dish</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/open-kitchen/dishes/queue_dish_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dishes'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateQueueDish</span><span class="p">(</span><span class="nx">queue_dish_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">queue_dish_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="s2">"pending"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="s2">"ingredientId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9c9"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"base"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"base"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bases"</span><span class="p">,</span><span class="w">
                    </span><span class="s2">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                        </span><span class="p">{</span><span class="w">
                            </span><span class="s2">"optionId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9797f12256f10e83bb9cd"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Warm Quinoa"</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"mandatory"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
                            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb949"</span><span class="w">
                        </span><span class="p">},</span><span class="w">
                        </span><span class="err">...</span><span class="w">
                    </span><span class="p">],</span><span class="w">
                    </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
                </span><span class="p">},</span><span class="w">
                </span><span class="err">...</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="s2">"added"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">],</span><span class="w">
            </span><span class="s2">"failed"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">],</span><span class="w">
            </span><span class="s2">"additions"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="err">...</span><span class="p">]</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"dishName"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priority"</span><span class="p">:</span><span class="w"> </span><span class="s2">"normal"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"queue"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sortOrder"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="s2">"simplifiedId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"8d16-8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cookingTime"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067f54056e410a8e2f2746"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"orderItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067e7575f5160a6fcb8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"customer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-01T22:19:14.257Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-27T22:01:56.797Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the queue dish in place, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/open-kitchen/dishes/queue_dish_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>simplifiedId</td>
<td>String</td>
<td>it&#39;s an ID that gets the last 4 digits of the order + last 4 digits of the order item + number of the dish ( in case if the quantity is greater than 1)</td>
</tr>
<tr>
<td>dishName</td>
<td>String</td>
<td>it&#39;s the name of the dish added to the order</td>
</tr>
<tr>
<td>orderItem</td>
<td>ObjectId</td>
<td>it&#39;s the primary key of the orderItem</td>
</tr>
<tr>
<td>priority</td>
<td>String</td>
<td>it identifies the level of the dish [low, normal, urgent]</td>
</tr>
<tr>
<td>ingredients</td>
<td>Object</td>
<td>it&#39;s an object that contains 4 arrays <a href="we%20will%20explain%20them%20in%20detail%20in%20the%20model%20documentation">pending, added, failed, additions</a></td>
</tr>
<tr>
<td>status</td>
<td>String</td>
<td>it&#39;s a representation of the current state of the dish which changes between these values [queue, cooking, packing, finished, failed, cancelled, on_review]</td>
</tr>
<tr>
<td>sortOrder</td>
<td>Number</td>
<td>it&#39;s a helper to sort them manually inside the application when we drag and drop them inside the board.</td>
</tr>
<tr>
<td>logs</td>
<td>Object</td>
<td>it&#39;s an Object</td>
</tr>
<tr>
<td>cookingTime</td>
<td>Number</td>
<td>it&#39;s a representation of the cooking time in minutes, to know how long the dish will be in the wok.</td>
</tr>
</tbody></table>
<h2 id='delete-dish'>Delete Dish</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/open-kitchen/dishes/queue_dish_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dishes'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>
<span class="cm">/**
 * @param {string} queue_dish_id
*/</span>
<span class="nx">deleteQueueDish</span><span class="p">(</span><span class="nx">queue_dish_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">queue_dish_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"ingredients"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="s2">"dishName"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Elote Bowl"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"priority"</span><span class="p">:</span><span class="w"> </span><span class="s2">"normal"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"queue"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"sortOrder"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="p">,</span><span class="w">
        </span><span class="s2">"simplifiedId"</span><span class="p">:</span><span class="w"> </span><span class="s2">"8d16-8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"cookingTime"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067f54056e410a8e2f2746"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"orderItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e067e7575f5160a6fcb8d17"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"customer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-01T23:11:18.702Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-12-27T22:01:56.797Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-01T23:11:18.702Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a wok that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific queue dish.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/open-kitchen/dishes/queue_dish_id</code></p>
<h1 id='woks'>Woks</h1><h2 id='get-woks'>Get Woks</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/woks'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestWoks</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
            </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c2"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"XsUbu9o"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_0"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.123Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.123Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
            </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c3"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lkmx5V1"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_1"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of woks in the restaurant. The Raspberry pi needs this list to know which woks are working and identify them by it&#39;s status.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/open-kitchen/woks</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_status</td>
<td>apply a status condition to the query. i.e <strong>available</strong></td>
</tr>
<tr>
<td>where_label</td>
<td>apply a label condition to the query i.e <strong>wok_1</strong></td>
</tr>
<tr>
<td>where_currentDish</td>
<td>apply a currentDish condition to the query i.e <strong>5dd9790212256f10e77ab521</strong>.</td>
</tr>
</tbody></table>
<h2 id='get-a-wok'>Get a Wok</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/woks/:wok_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/woks'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestWok</span><span class="p">(</span><span class="nx">wok_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">wok_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lkmx5V1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one wok by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/woks/:wok_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='update-wok'>Update wok</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/open-kitchen/woks/wok_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/woks'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateWok</span><span class="p">(</span><span class="nx">wok_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">wok_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lkmx5V1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_1_updated"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the wok in place, not a lot of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/open-kitchen/woks/wok_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>status</td>
<td>String</td>
<td>You can modify the status of the wok to make them available or busy(cooking).</td>
</tr>
<tr>
<td>notes</td>
<td>String</td>
<td>You can add/update notes for this specific wok.</td>
</tr>
<tr>
<td>currentDish</td>
<td>ObjectId</td>
<td>Assign a QueueDish so everyone knows which dish will be cooked on the wok.</td>
</tr>
<tr>
<td>identifier</td>
<td>String</td>
<td>it&#39;s an ID that will map the wok to the one connected in the restaurant.</td>
</tr>
<tr>
<td>label</td>
<td>String</td>
<td>this is a human friendly label to identify the wok.</td>
</tr>
</tbody></table>
<h2 id='delete-wok'>Delete wok</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/open-kitchen/woks/wok_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/woks'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {Object} wok_id
*/</span>
<span class="nx">deleteWok</span><span class="p">(</span><span class="nx">wok_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">wok_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"available"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">" "</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentDish"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790412256f10e83bb9c3"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lkmx5V1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"wok_1_updated"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2019-11-23T18:23:00.124Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-01T23:11:18.702Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a wok that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific wok.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/open-kitchen/woks/wok_id</code></p>
<h1 id='dispensers'>Dispensers</h1><h2 id='get-dispensers'>Get Dispensers</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dispensers'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestDispensers</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dispenser 001"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"disp001"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:28:11.412Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of dispensers that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/open-kitchen/dispensers</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_active</td>
<td>apply a &#39;active&#39; condition to the query. i.e <strong>true</strong></td>
</tr>
<tr>
<td>where_inventoryItem</td>
<td>apply a &#39;inventoryItem&#39; condition to the query i.e <strong>5dd9790312256f10e83bb93f</strong></td>
</tr>
<tr>
<td>where&lt;_currentLoad</td>
<td>apply a &#39;currentLoad&#39; condition to the query i.e <strong>10</strong></td>
</tr>
<tr>
<td>where_identifier</td>
<td>apply a &#39;identifier&#39; condition to the query i.e <strong>disp001</strong></td>
</tr>
</tbody></table>
<h2 id='get-a-dispenser'>Get a Dispenser</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/dispensers/:dispenser_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dispensers'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestDispenser</span><span class="p">(</span><span class="nx">dispenser_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">dispenser_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dispenser A"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"disp1"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:28:11.412Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one dispenser by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/dispensers/:dispenser_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-a-dispenser'>Create a Dispenser</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/open-kitchen/dispensers</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dispensers'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createDispenser</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid."</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new dispenser. if you create a new dispenser you need to be aware that you need to make sure to add a identifier that is not taken already. otherwise it will throw an exception.</p>
<h2 id='update-a-dispenser'>Update a Dispenser</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/open-kitchen/dispensers/dispenser_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dispensers'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateDispenser</span><span class="p">(</span><span class="nx">dispenser_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">dispenser_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">

  </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
  </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid."</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:28:11.412Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the dispenser, not all of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/open-kitchen/dispensers/dispenser_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>label</td>
<td>String</td>
<td>You can modify the label (human friendly identifier)</td>
</tr>
<tr>
<td>identifier</td>
<td>String</td>
<td>You can modify the identifier ( it has to be unique )</td>
</tr>
<tr>
<td>inventoryItem</td>
<td>ObjectID</td>
<td>You can assign an InventoryItem to the dispenser to track statistics.</td>
</tr>
<tr>
<td>capacity</td>
<td>Number</td>
<td>You can set the capacity the dispenser has (maximum load)</td>
</tr>
<tr>
<td>currentLoad</td>
<td>Number</td>
<td>You can set the current load (so we can notify the staff about low quantities).</td>
</tr>
<tr>
<td>active</td>
<td>Boolean</td>
<td>You can Enable/Disable the dispenser.</td>
</tr>
<tr>
<td>notes</td>
<td>String</td>
<td>You can add some notes to the dispenser in case there are some special instructions.</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>restaurant</td>
<td>ObjectID</td>
<td>Restaurant Object ID</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-dispenser'>Delete Dispenser</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/open-kitchen/dispensers/dispenser_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/dispensers'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {String} dispenser_id
*/</span>
<span class="nx">deleteDispenser</span><span class="p">(</span><span class="nx">dispenser_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">dispenser_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lettuce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"lettuce_refid."</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:30:56.098Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:30:56.096Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a dispenser that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific dispenser.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/open-kitchen/dispensers/dispenser_id</code></p>
<h1 id='sauce-bags'>Sauce Bags</h1><h2 id='get-sauce-bags'>Get Sauce Bags</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/sauce-bags'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestSauceBags</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
            </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
            </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
            </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Teriyaki Sauce"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sg_teri_sauce"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:28:11.412Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
            </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a list of sauce bags that the staff / chef can see under the same ownership.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/open-kitchen/sauce-bags</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_inventoryItem</td>
<td>apply a &#39;inventoryItem&#39; condition to the query. i.e <strong>5dd9790312256f10e83bb93f</strong></td>
</tr>
<tr>
<td>where_active</td>
<td>apply a &#39;active&#39; condition to the query i.e <strong>true</strong></td>
</tr>
<tr>
<td>where_identifier</td>
<td>apply a &#39;identifier&#39; condition to the query i.e <strong>sg_001</strong></td>
</tr>
</tbody></table>
<h2 id='get-sauce-bag'>Get Sauce Bag</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/sauce-bags/:sauce_bag_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/sauce-bags'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestSauceBag</span><span class="p">(</span><span class="nx">sauce_bag_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">sauce_bag_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Oil"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sg_oil"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:28:11.412Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one sauce bag by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/sauce-bags/:sauce_bag_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-sauce-bag'>Create Sauce Bag</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/open-kitchen/sauce-bags</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/sauce-bags'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createSauceBag</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Soy Sauce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sg_soys"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new sauce bag. if you create a new sauge bag you need to be aware that you need to make sure to add an identifier that is not taken already. otherwise it will throw an exception.</p>
<h2 id='update-sauce-bag'>Update Sauce Bag</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/open-kitchen/sauce-bags/sauce_bag_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/sauce-bags'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateSauceBag</span><span class="p">(</span><span class="nx">sauce_bag_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">sauce_bag_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">

  </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
  </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="p">,</span><span class="w">
  </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sauce bag sometimes releases more content than normal"</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
       </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sauce bag sometimes releases more content than normal"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Soy Sauce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sg_soys"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the sauce bag, not all of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/open-kitchen/sauce-bags/sauce_bag_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>label</td>
<td>String</td>
<td>You can modify the label (human friendly identifier)</td>
</tr>
<tr>
<td>identifier</td>
<td>String</td>
<td>You can modify the identifier ( it has to be unique )</td>
</tr>
<tr>
<td>inventoryItem</td>
<td>ObjectID</td>
<td>You can assign an InventoryItem to the sauce bag to track statistics.</td>
</tr>
<tr>
<td>capacity</td>
<td>Number</td>
<td>You can set the capacity the sauce bag has (maximum load)</td>
</tr>
<tr>
<td>currentLoad</td>
<td>Number</td>
<td>You can set the current load (so we can notify the staff about low quantities).</td>
</tr>
<tr>
<td>active</td>
<td>Boolean</td>
<td>You can Enable/Disable the sauce bag.</td>
</tr>
<tr>
<td>notes</td>
<td>String</td>
<td>You can add some notes to the sauce bag in case there are some special instructions.</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>restaurant</td>
<td>ObjectID</td>
<td>Restaurant Object ID</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-sauce-bag'>Delete Sauce Bag</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/open-kitchen/sauce-bags/sauce_bag_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/open-kitchen/sauce-bags'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {String} sauce_bag_id
*/</span>
<span class="nx">deleteSauceBag</span><span class="p">(</span><span class="nx">sauce_bag_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">sauce_bag_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"capacity"</span><span class="p">:</span><span class="w"> </span><span class="mi">50</span><span class="p">,</span><span class="w">
        </span><span class="s2">"currentLoad"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"active"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"notes"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sauce bag sometimes releases more content than normal"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e118e9c11a8820b7ea66efa"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"inventoryItem"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790312256f10e83bb93f"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Soy Sauce"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"identifier"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sg_soys"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790112256f10e83bb932"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:22:04.868Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-01-05T07:30:56.096Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a sauce bag that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific sauce bag.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/open-kitchen/sauce-bags/sauce_bag_id</code></p>
<h1 id='shopping-carts'>Shopping Carts</h1><h2 id='get-shopping-carts'>Get Shopping Carts</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/shopping-carts'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestShoppingCarts</span><span class="p">(</span><span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">

    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"order"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"dates"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"shoppingCartItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5e52fb397896c40fb0833efc"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"subTotal"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"discount"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="mi">960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">10960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e40da7bdd54ce1b2f57d7ec"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0dd"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:22:49.495Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-10T04:22:19.400Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">

</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves the latest active shopping cart the user has. this endpoint is useful if you don&#39;t know the shopping cart id that is active at the moment.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/api/shopping-carts</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>where_completed</td>
<td>apply a &#39;completed&#39; condition to the query. i.e <strong>true</strong></td>
</tr>
<tr>
<td>where_active</td>
<td>apply a &#39;active&#39; condition to the query i.e <strong>true</strong></td>
</tr>
<tr>
<td>where_total</td>
<td>apply a &#39;total&#39; condition to the query i.e <strong>25000</strong></td>
</tr>
</tbody></table>
<h2 id='get-shopping-cart'>Get Shopping Cart</h2>
<blockquote>
<p>GET - https://node.chefsurf.io/open-kitchen/shopping-carts/:shopping_cart_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/shopping-carts'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">requestShoppingCart</span><span class="p">(</span><span class="nx">shopping_cart_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">shopping_cart_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="nx">params</span><span class="p">,</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"order"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"dates"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"shoppingCartItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5e52fb397896c40fb0833efc"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"subTotal"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"discount"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="mi">960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">10960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e40da7bdd54ce1b2f57d7ec"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0dd"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:22:49.495Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-10T04:22:19.400Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves one shopping cart by the ID.</p>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET https://node.chefsurf.io/open-kitchen/shopping-carts/:shopping_cart_id</code></p>

<!-- ### URL Parameters -->

<!--
Parameter | Description
--------- | -----------
ID | The ID of the kitten to delete
 -->
<h2 id='create-shopping-cart'>Create Shopping Cart</h2>
<blockquote>
<p>POST = https://node.chefsurf.io/api/shopping-carts</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code>  <span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/shopping-carts'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">createShoppingCart</span><span class="p">(</span><span class="nx">data</span><span class="p">)</span> <span class="p">{</span>
    <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">data</span><span class="p">,</span> <span class="p">{</span>
        <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
        <span class="p">}</span>
    <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data when creating a new shopping cart</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"newItem"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="err">//...shoppingCartItemData</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"coupon"</span><span class="p">:</span><span class="w"> </span><span class="s2">"3de5970157956f10d23bc628"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="s2">"order"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"dates"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"shoppingCartItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5e52fb397896c40fb0833efc"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"subTotal"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"discount"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="mi">960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">10960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e40da7bdd54ce1b2f57d7ec"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0dd"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:22:49.495Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-10T04:22:19.400Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to create a new shopping cart. you cannot have two active shopping carts since we need to complete order first to open a new cart.</p>
<h2 id='update-shopping-cart'>Update Shopping Cart</h2>
<blockquote>
<p>PUT - https://node.chefsurf.io/api/shopping-carts/shopping_cart_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/shopping-carts'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="nx">updateShoppingCart</span><span class="p">(</span><span class="nx">shopping_cart_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">shopping_cart_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="nx">params</span><span class="p">,</span> <span class="p">{</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>Sample Data ( you can send the params you want to be updated in your request )</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"order"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"dates"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"shoppingCartItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5e52fb397896c40fb0833efc"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"subTotal"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"discount"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="mi">960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">10960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e40da7bdd54ce1b2f57d7ec"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0dd"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:22:49.495Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-10T04:22:19.400Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint allows you to modify the shopping cart, not all of the properties can be modified and there are formats that must be followed otherwise it will throw an error.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>PUT - https://node.chefsurf.io/api/shopping-carts/shopping_cart_id</code></p>
<h3 id='fillable-properties'>Fillable properties</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>completed</td>
<td>Boolean</td>
<td>true or false, this will define when the cart has been completed based on the order Object ID assigment.</td>
</tr>
<tr>
<td>coupon</td>
<td>ObjectID</td>
<td>Coupon Object ID.</td>
</tr>
<tr>
<td>creditsUsed</td>
<td>Number</td>
<td>Quantity of credits used - pending to create Credit Object ID.</td>
</tr>
<tr>
<td>order</td>
<td>ObjectID</td>
<td>Order Object ID.</td>
</tr>
</tbody></table>
<h3 id='non-fillable'>Non fillable</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>_id</td>
<td>ObjectID</td>
<td>Primary key</td>
</tr>
<tr>
<td>restaurant</td>
<td>ObjectID</td>
<td>Restaurant Object ID</td>
</tr>
<tr>
<td>owner</td>
<td>ObjectID</td>
<td>Ower Object ID</td>
</tr>
<tr>
<td>user</td>
<td>ObjectID</td>
<td>User Object ID</td>
</tr>
<tr>
<td>updatedAt</td>
<td>DateTime</td>
<td>Update timestamps - auto generated.</td>
</tr>
<tr>
<td>createdAt</td>
<td>DateTime</td>
<td>Create timestamps - auto generated.</td>
</tr>
</tbody></table>
<h2 id='delete-shopping-cart'>Delete Shopping Cart</h2>
<blockquote>
<p>DELETE - https://node.chefsurf.io/api/shopping-carts/shopping_cart_id</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
  <span class="nx">HttpClient</span>
<span class="p">}</span> <span class="nx">from</span> <span class="s1">'@angular/common/http'</span><span class="p">;</span>

<span class="kr">const</span> <span class="nx">path</span> <span class="o">=</span> <span class="s1">'https://node.chefsurf.io/api/shopping-carts'</span><span class="p">;</span>

<span class="nx">constructor</span><span class="p">(</span><span class="kr">private</span> <span class="nx">http</span><span class="p">:</span> <span class="nx">HttpClient</span><span class="p">)</span> <span class="p">{</span>
<span class="p">}</span>

<span class="cm">/**
 * @param {String} shopping_cart_id
*/</span>
<span class="nx">deleteShoppingCart</span><span class="p">(</span><span class="nx">shopping_cart_id</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">shopping_cart_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
    <span class="p">{},</span>
    <span class="na">headers</span><span class="p">:</span> <span class="p">{</span>
      <span class="na">Authorization</span><span class="p">:</span> <span class="s2">`JWT </span><span class="p">${</span><span class="nx">jwt_token</span><span class="p">}</span><span class="s2">`</span>
    <span class="p">}</span>
  <span class="p">});</span>
<span class="p">}</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"data"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"completed"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="s2">"order"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"dates"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="s2">"shoppingCartItems"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="s2">"5e52fb397896c40fb0833efc"</span><span class="p">,</span><span class="w">
            </span><span class="err">...</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="s2">"creditsUsed"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="s2">"subTotal"</span><span class="p">:</span><span class="w"> </span><span class="mi">12000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"discount"</span><span class="p">:</span><span class="w"> </span><span class="mi">2000</span><span class="p">,</span><span class="w">
        </span><span class="s2">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="mi">960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">10960</span><span class="p">,</span><span class="w">
        </span><span class="s2">"_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5e40da7bdd54ce1b2f57d7ec"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"restaurant"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dd9790212256f10e83bb934"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"owner"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0dd"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"user"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5dfc657506b7c674c1fbf0de"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updatedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:22:49.495Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"createdAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-10T04:22:19.400Z"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"__v"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"deletedAt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2020-02-23T22:30:00.400Z"</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<blockquote>
<p>If you are trying to delete a shopping cart that it has been deleted, you will get an exception: 404.</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="s2">"code"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NotFound"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"message"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Record not found."</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific shopping cart.</p>
<h3 id='http-request-4'>HTTP Request</h3>
<p><code>DELETE - https://node.chefsurf.io/api/shopping-carts/shopping_cart_id</code></p>
<h1 id='query-helpers'>Query Helpers</h1>
<p>Our API supports different kind of conditions, at the moment we have a limited set of conditions and they only work as &#39;AND&#39; conditions not &#39;OR&#39; conditions... yet!</p>

<p>Here are all the examples of conditions you could do in the platform when you query a list of records and you want to limit the responses with certain conditions you are looking for.</p>

<table><thead>
<tr>
<th>Condition</th>
<th>Example</th>
<th>Query param</th>
</tr>
</thead><tbody>
<tr>
<td>where_</td>
<td>where_identifier</td>
<td>{ where_identifier: &#39;text_here&#39; }</td>
</tr>
<tr>
<td>in_</td>
<td>in_type</td>
<td>{ in_type: [&#39;available&#39;, &#39;waiting_for_ingredients&#39;],}</td>
</tr>
<tr>
<td>like_</td>
<td>like_name</td>
<td>{ like_name: &#39;chicken&#39;}</td>
</tr>
<tr>
<td>wherenot_</td>
<td>wherenot_category</td>
<td>{ wherenot_category: &#39;grains_bowl_category&#39; }</td>
</tr>
<tr>
<td>where&lt;_</td>
<td>where&lt;_capacity</td>
<td>{ where&lt;_capacity: 10 }</td>
</tr>
<tr>
<td>where&gt;_</td>
<td>where&gt;_currentLoad</td>
<td>{ where&gt;_currentLoad: 5}</td>
</tr>
<tr>
<td>where&lt;=_</td>
<td>where&lt;=_capacity</td>
<td>{ where&lt;=_capacity: 5 }</td>
</tr>
<tr>
<td>where&gt;=_</td>
<td>where&gt;=_currentLoad</td>
<td>{ where&gt;=_currentLoad: 5 }</td>
</tr>
<tr>
<td>where-not-null_</td>
<td>where-not-null_inventoryItem</td>
<td>{ where-not-null_inventoryItem: true }</td>
</tr>
<tr>
<td>where-null_</td>
<td>where-null_inventoryItem</td>
<td>{ where-null_inventoryItem: true }</td>
</tr>
</tbody></table>
<h1 id='errors'>Errors</h1>
<p>The API uses the following error codes:</p>

<table><thead>
<tr>
<th>Error Code</th>
<th>Meaning</th>
</tr>
</thead><tbody>
<tr>
<td>400</td>
<td>Bad Request -- Your request is invalid.</td>
</tr>
<tr>
<td>401</td>
<td>Unauthorized -- Your API Token is wrong.</td>
</tr>
<tr>
<td>403</td>
<td>Forbidden -- The record requested is hidden for administrators only.</td>
</tr>
<tr>
<td>404</td>
<td>Not Found -- The specified record could not be found.</td>
</tr>
<tr>
<td>405</td>
<td>Method Not Allowed -- You tried to access a record with an invalid method.</td>
</tr>
<tr>
<td>406</td>
<td>Not Acceptable -- You requested a format that isn&#39;t json.</td>
</tr>
<tr>
<td>409</td>
<td>Conflict - Your record conflicts with existing records in our servers.</td>
</tr>
<tr>
<td>410</td>
<td>Gone -- The record requested has been removed from our servers.</td>
</tr>
<tr>
<td>418</td>
<td>I&#39;m a teapot.</td>
</tr>
<tr>
<td>429</td>
<td>Too Many Requests -- You&#39;re requesting too many records! Slow down!</td>
</tr>
<tr>
<td>500</td>
<td>Internal Server Error -- We had a problem with our server. Try again later.</td>
</tr>
<tr>
<td>503</td>
<td>Service Unavailable -- We&#39;re temporarily offline for maintenance. Please try again later.</td>
</tr>
</tbody></table>
<h1 id='models'>Models</h1><h2 id='chef'>Chef</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">ChefSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">jobTitle</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'Chef'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='client'>Client</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">ClientSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">allowCashPayments</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">identityNumber</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">phone</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">lastAddressUsed</span><span class="p">:</span> <span class="p">{</span>

    <span class="p">},</span>
    <span class="na">lastPaymentMethodUsed</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'cash'</span><span class="p">,</span> <span class="s1">'credit_card'</span><span class="p">,</span> <span class="s1">'credits'</span><span class="p">,</span> <span class="s1">'rappi'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='credit'>Credit</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">CreditSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">order</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Order'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">reason</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">amount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">invitation</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Invitation'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">referenceCredit</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Credit'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'invite'</span><span class="p">,</span> <span class="s1">'transaction'</span><span class="p">,</span> <span class="s1">'refund'</span><span class="p">,</span> <span class="s1">'gift'</span><span class="p">,</span> <span class="s1">'super_admin_granted'</span><span class="p">]</span>
    <span class="p">},</span>
    <span class="na">grantedBy</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">grantedAt</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='coupon'>Coupon</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">CouponSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">creator</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">category</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'food_discount'</span><span class="p">,</span> <span class="s1">'order_discount'</span><span class="p">,</span> <span class="s1">'delivery_discount'</span><span class="p">,</span> <span class="s1">'waive_delivery'</span><span class="p">,</span> <span class="s1">'waive_food'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'percentage'</span><span class="p">,</span> <span class="s1">'amount'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">value</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">currency</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'cop'</span><span class="p">,</span> <span class="s1">'mxn'</span><span class="p">,</span> <span class="s1">'usd'</span><span class="p">,</span> <span class="s1">'cad'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'cop'</span>
    <span class="p">},</span>
    <span class="na">availability</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'all_chefs'</span><span class="p">,</span> <span class="s1">'exclusive_chef'</span><span class="p">,</span> <span class="s1">'exclusive_product'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'all_chefs'</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">chef</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Chef'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">startDate</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Date</span>
    <span class="p">},</span>
    <span class="na">endDate</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Date</span>
    <span class="p">},</span>
    <span class="na">availableForInDays</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">invitation</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">code</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">unique</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">conditions</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">minQuantity</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="mi">5000</span><span class="p">,</span>
            <span class="na">min</span><span class="p">:</span> <span class="mi">1</span>
        <span class="p">},</span>
        <span class="na">maxQuantity</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span>
        <span class="p">},</span>
        <span class="na">minProducts</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
            <span class="na">min</span><span class="p">:</span> <span class="mi">0</span>
        <span class="p">},</span>
        <span class="na">maxProducts</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="mi">99</span>
        <span class="p">},</span>
        <span class="na">onlyIfPairs</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
        <span class="p">},</span>
        <span class="na">usageLimit</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
            <span class="na">min</span><span class="p">:</span> <span class="mi">1</span>
        <span class="p">}</span>
    <span class="p">},</span>
    <span class="na">usages</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Order'</span>
    <span class="p">}]</span>
<span class="p">});</span>
</code></pre><h2 id='dish'>Dish</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">DishSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">dishName</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s2">``</span>
    <span class="p">},</span>
    <span class="na">dishPicture</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Attachment'</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">product</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Product'</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">priority</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'low'</span><span class="p">,</span> <span class="s1">'normal'</span><span class="p">,</span> <span class="s1">'urgent'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'normal'</span>
    <span class="p">},</span>
    <span class="na">status</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'queue'</span><span class="p">,</span> <span class="s1">'cooking'</span><span class="p">,</span> <span class="s1">'packing'</span><span class="p">,</span> <span class="s1">'finished'</span><span class="p">,</span> <span class="s1">'failed'</span><span class="p">,</span> <span class="s1">'cancelled'</span><span class="p">,</span> <span class="s1">'on_review'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'queue'</span>
    <span class="p">},</span>
    <span class="na">sortOrder</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">simplifiedId</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'----'</span><span class="p">,</span>
        <span class="c1">// required: true</span>
    <span class="p">},</span>
    <span class="na">cookingTime</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="c1">// required: true</span>
    <span class="p">},</span>
    <span class="na">pendingIngredients</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'DishIngredient'</span><span class="p">,</span>
    <span class="p">}],</span>
    <span class="na">addedIngredients</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'DishIngredient'</span><span class="p">,</span>
    <span class="p">}],</span>
    <span class="na">failedIngredients</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'DishIngredient'</span><span class="p">,</span>
    <span class="p">}],</span>
    <span class="na">orderItem</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'OrderItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">customer</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">wok</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Wok'</span><span class="p">,</span>
        <span class="na">require</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='dispenser'>Dispenser</h2>
<blockquote>
<p>Schema Definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">DispenserSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">label</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">identifier</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">inventoryItem</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'InventoryItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">capacity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">currentLoad</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">notes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s2">""</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='inventory'>Inventory</h2>
<blockquote>
<p>Schema Definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">InventorySchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">maxCapacity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
        <span class="na">max</span><span class="p">:</span> <span class="mi">9999</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">10</span>
    <span class="p">},</span>
    <span class="na">sendAlertsOnLowInventory</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">alertOnQuantity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">current</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='inventory-item'>Inventory Item</h2>
<blockquote>
<p>Schema definition </p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">InventoryItemSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">inventory</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Inventory'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">category</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'ingredient'</span><span class="p">,</span> <span class="s1">'drink'</span><span class="p">,</span> <span class="s1">'dessert'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'ingredient'</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'base'</span><span class="p">,</span> <span class="s1">'veggie'</span><span class="p">,</span> <span class="s1">'dressing'</span><span class="p">,</span> <span class="s1">'protein'</span><span class="p">,</span> <span class="s1">'extra'</span><span class="p">,</span> <span class="s1">'drink'</span><span class="p">,</span> <span class="s1">'dessert'</span><span class="p">,</span> <span class="s1">'topping'</span><span class="p">,</span> <span class="s1">'premium'</span><span class="p">,</span> <span class="s1">'none'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">origin</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'dispenser'</span><span class="p">,</span> <span class="s1">'cold_bar'</span><span class="p">,</span> <span class="s1">'fridge'</span><span class="p">,</span> <span class="s1">'other'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'dispenser'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">otherOrigin</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">title</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">description</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">onStock</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">stockQuantity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">max</span><span class="p">:</span> <span class="mi">9999</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">onProduction</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">productionQuantity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">max</span><span class="p">:</span> <span class="mi">9999</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">referenceId</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'---'</span>
    <span class="p">},</span>
    <span class="na">maxProductionCapacity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
        <span class="na">max</span><span class="p">:</span> <span class="mi">9999</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">50</span>
    <span class="p">},</span>
    <span class="na">price</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">measurement</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'gram'</span><span class="p">,</span> <span class="s1">'kilogram'</span><span class="p">,</span> <span class="s1">'oz'</span><span class="p">,</span> <span class="s1">'piece'</span><span class="p">,</span> <span class="s1">'none'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">measurementUnit</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">totalMeasurement</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'gram'</span><span class="p">,</span> <span class="s1">'kilogram'</span><span class="p">,</span> <span class="s1">'oz'</span><span class="p">,</span> <span class="s1">'piece'</span><span class="p">,</span> <span class="s1">'none'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">totalMeasurementUnits</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">priceForRawItem</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">min</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">pictures</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">SchemaTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Attachment'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">}]</span>
<span class="p">});</span>
</code></pre><h2 id='kushki-card'>Kushki Card</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">KushkiCardSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">last4</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">expMonth</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">expYear</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">cvv</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">subscriptionId</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">token</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'single_charge'</span><span class="p">,</span> <span class="s1">'subscription'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'single_charge'</span>
    <span class="p">},</span>
    <span class="na">singlePaymentAmount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">currency</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'COP'</span><span class="p">,</span> <span class="s1">'USD'</span><span class="p">,</span> <span class="s1">'CAD'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'COP'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
<span class="p">});</span>
</code></pre><h2 id='kushki-ticket'>Kushki Ticket</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">KushkiTicketSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">kushkiCard</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'KushkiCard'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">ticketNumber</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">set</span><span class="p">:</span> <span class="nx">_encryptIt</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">token</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">set</span><span class="p">:</span> <span class="nx">_encryptIt</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">requiresWebhook</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">currencyCode</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'COP'</span><span class="p">,</span> <span class="s1">'USD'</span><span class="p">,</span> <span class="s1">'CAD'</span><span class="p">]</span>
    <span class="p">},</span>
    <span class="na">ip</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">set</span><span class="p">:</span> <span class="nx">_encryptIt</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">maskedCardNumber</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">approvedTransactionAmount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span>
    <span class="p">},</span>
    <span class="na">subtotalIva</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">subtotalIva0</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">responseCode</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">transactionType</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">approvalCode</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">transactionStatus</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">requestAmount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'single_charge'</span><span class="p">,</span> <span class="s1">'subscription'</span><span class="p">,</span> <span class="s1">'refund'</span><span class="p">,</span> <span class="s1">'void'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'single_charge'</span>
    <span class="p">},</span>
    <span class="na">details</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">JSON</span><span class="p">,</span>
        <span class="na">set</span><span class="p">:</span> <span class="nx">_encryptDetails</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='order'>Order</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">OrderSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">shoppingCart</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCart'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">shoppingCartItems</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCartItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}],</span>
    <span class="na">references</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">shoppingCartItems</span><span class="p">:</span> <span class="p">[],</span> <span class="c1">//@deprecated</span>
        <span class="na">sellingWeek</span><span class="p">:</span> <span class="p">{},</span>
    <span class="p">},</span>
    <span class="na">customer</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'client'</span><span class="p">,</span> <span class="s1">'chef'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'client'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">referenceOrder</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Order'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">receivingMethod</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'delivery'</span><span class="p">,</span> <span class="s1">'eat_here'</span><span class="p">,</span> <span class="s1">'to_go'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'eat_here'</span>
    <span class="p">},</span>
    <span class="na">delivery</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">pickup</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">clientLocation</span><span class="p">:</span> <span class="p">{},</span>
    <span class="na">deliveryFee</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">1</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">subTotal</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">discount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">taxes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">total</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">paymentMethod</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'cash'</span><span class="p">,</span> <span class="s1">'credit_card'</span><span class="p">,</span> <span class="s1">'credits'</span><span class="p">,</span> <span class="s1">'cash_and_credits'</span><span class="p">,</span> <span class="s1">'credit_card_and_credits'</span><span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">cancellationReason</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">transaction</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Transaction'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">status</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'draft'</span><span class="p">,</span> <span class="s1">'placed'</span><span class="p">,</span> <span class="s1">'preparing_order'</span><span class="p">,</span> <span class="s1">'delivering'</span><span class="p">,</span> <span class="s1">'ready_for_pickup'</span><span class="p">,</span> <span class="s1">'at_address'</span><span class="p">,</span> <span class="s1">'complete'</span><span class="p">,</span> <span class="s1">'refunded'</span><span class="p">,</span> <span class="s1">'cancelled'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'draft'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">foodStatus</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'not_started'</span><span class="p">,</span> <span class="s1">'preparing'</span><span class="p">,</span> <span class="s1">'cooked'</span><span class="p">,</span> <span class="s1">'packed'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'not_started'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">paymentStatus</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'pending'</span><span class="p">,</span> <span class="s1">'validating'</span><span class="p">,</span> <span class="s1">'paid'</span><span class="p">,</span> <span class="s1">'rejected'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'pending'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">deliveryStatus</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'pending'</span><span class="p">,</span> <span class="s1">'delivering'</span><span class="p">,</span> <span class="s1">'at_address'</span><span class="p">,</span> <span class="s1">'delivered'</span><span class="p">,</span> <span class="s1">'returned'</span><span class="p">,</span> <span class="s1">'user_not_showed_up'</span><span class="p">,</span> <span class="s1">'at_front'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'pending'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="c1">// selectedTime: {</span>
    <span class="c1">//     type: mongoose.Schema.Types.String,</span>
    <span class="c1">//     default: '12:00:00'</span>
    <span class="c1">// },</span>
    <span class="c1">// selectedDate: {</span>
    <span class="c1">//     type: mongoose.Schema.Types.String,</span>
    <span class="c1">// },</span>
    <span class="na">payUResponses</span><span class="p">:</span> <span class="p">[],</span>
    <span class="na">coupon</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">_id</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
            <span class="na">ref</span><span class="p">:</span> <span class="s1">'Coupon'</span>
        <span class="p">},</span>
        <span class="na">reference</span><span class="p">:</span> <span class="p">{}</span>
    <span class="p">},</span>
    <span class="na">credit</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Credit'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">contactPhone</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span>
    <span class="p">},</span>
    <span class="na">origin</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'web'</span><span class="p">,</span> <span class="s1">'android'</span><span class="p">,</span> <span class="s1">'ios'</span><span class="p">,</span> <span class="s1">'bot'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'web'</span>
    <span class="p">},</span>
    <span class="na">appVersion</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'not_set'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">orderItems</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'OrderItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}]</span>
<span class="p">});</span>
</code></pre><h2 id='order-item'>Order Item</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">OrderItemSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">customer</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">order</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Order'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">date</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span>
    <span class="p">},</span>
    <span class="na">time</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span>
    <span class="p">},</span>
    <span class="na">dateTime</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span>
    <span class="p">},</span>
    <span class="na">shoppingCartItem</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCartItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">complete</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">references</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">shoppingCartItem</span><span class="p">:</span> <span class="p">{}</span>
    <span class="p">},</span>
    <span class="na">status</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'placed'</span><span class="p">,</span> <span class="s1">'queue'</span><span class="p">,</span> <span class="s1">'cooking'</span><span class="p">,</span> <span class="s1">'delivering'</span><span class="p">,</span> <span class="s1">'ready_for_pickup'</span><span class="p">,</span> <span class="s1">'at_address'</span><span class="p">,</span> <span class="s1">'complete'</span><span class="p">,</span> <span class="s1">'returned'</span><span class="p">,</span> <span class="s1">'cancelled'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'placed'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">priority</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'low'</span><span class="p">,</span> <span class="s1">'normal'</span><span class="p">,</span> <span class="s1">'urgent'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'normal'</span>
    <span class="p">},</span>
    <span class="na">product</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Product'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">total</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
<span class="p">});</span>
</code></pre><h2 id='product'>Product</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">ProductSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">category</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span>
            <span class="s1">'grains_bowl_category'</span><span class="p">,</span>
            <span class="s1">'greens_grains_bowl_category'</span><span class="p">,</span>
            <span class="s1">'greens_bowl_category'</span><span class="p">,</span>
            <span class="s1">'pita_category'</span><span class="p">,</span>
            <span class="s1">'mini_pita_category'</span><span class="p">,</span>
            <span class="s1">'soup_pita_category'</span><span class="p">,</span>
            <span class="s1">'drink'</span><span class="p">,</span>
            <span class="s1">'none'</span>
        <span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">title</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">price</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">description</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">position</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">measurement</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'gram'</span><span class="p">,</span> <span class="s1">'kilogram'</span><span class="p">,</span> <span class="s1">'oz'</span><span class="p">,</span> <span class="s1">'piece'</span><span class="p">,</span> <span class="s1">'none'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span>
    <span class="p">},</span>
    <span class="na">measurementUnit</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">calories</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">attachments</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Attachment'</span>
    <span class="p">}],</span>
    <span class="na">availability</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">monday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">tuesday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">wednesday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">thursday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">friday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">saturday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">},</span>
        <span class="na">sunday</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
            <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">}</span>
    <span class="p">},</span>
    <span class="na">ingredients</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ProductIngredient'</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}],</span>
    <span class="na">drinks</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ProductIngredient'</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}],</span>
    <span class="na">desserts</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ProductIngredient'</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}],</span>
    <span class="na">cookingTime</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">createdBy</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongooseType</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
<span class="p">});</span>
</code></pre><h2 id='restaurant'>Restaurant</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">RestaurantSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">chefs</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoTypes</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Chef'</span>
    <span class="p">}],</span>
    <span class="na">logo</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">background</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">location</span><span class="p">:</span> <span class="p">{},</span>
    <span class="na">name</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">automatedKitchen</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">deliveryAvailable</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">pickUpAvailable</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">cashPaymentAvailable</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">creditCardPaymentAvailable</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">domain</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoTypes</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">unique</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='sauce-bag'>Sauce Bag</h2>
<blockquote>
<p>Schema definiton</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">SauceBagSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">label</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">identifier</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">inventoryItem</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'InventoryItem'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">capacity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">currentLoad</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">notes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s2">""</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre><h2 id='shopping-cart'>Shopping Cart</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">ShoppingCartSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">user</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'User'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">completed</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">order</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Order'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">startDay</span><span class="p">:</span> <span class="p">{</span> <span class="c1">//will be removed</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">endDay</span><span class="p">:</span> <span class="p">{</span> <span class="c1">//will be removed</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">dates</span><span class="p">:</span> <span class="p">[],</span> <span class="c1">//will be removed</span>
    <span class="na">shoppingCartItems</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCartItem'</span>
    <span class="p">}],</span>
    <span class="na">coupon</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">_id</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
            <span class="na">ref</span><span class="p">:</span> <span class="s1">'Coupon'</span>
        <span class="p">},</span>
        <span class="na">reference</span><span class="p">:</span> <span class="p">{}</span>
    <span class="p">},</span>
    <span class="na">creditsUsed</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">subTotal</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">discount</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span>
    <span class="p">},</span>
    <span class="na">taxes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">total</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
<span class="p">});</span>
</code></pre><h2 id='shopping-cart-item'>Shopping Cart Item</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">ShoppingCartItemSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">shoppingCart</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCart'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">product</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Product'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">quantity</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">productPrice</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">subTotal</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">total</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">notes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">selectedDate</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">date</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span> <span class="c1">//string now</span>
        <span class="na">dayInEnglish</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">dayInSpanish</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">dayNumber</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">time</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
            <span class="na">default</span><span class="p">:</span> <span class="s1">'12:00:00'</span>
        <span class="p">}</span>
    <span class="p">},</span>
    <span class="na">type</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'drink'</span><span class="p">,</span> <span class="s1">'dish'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'dish'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">selectedIngredients</span><span class="p">:</span> <span class="p">[{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'ShoppingCartItemIngredient'</span><span class="p">,</span>
    <span class="p">}],</span>
    <span class="na">drinkDetails</span><span class="p">:</span> <span class="p">{},</span>
    <span class="na">ingredients</span><span class="p">:</span> <span class="p">[{}],</span>
    <span class="na">customerName</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre>
<p>The shopping cart items are essential for our proper functionality of the order flow inside Satee, it&#39;s not mandatory to follow this but it&#39;s recommended since OpenKitchen works better with all this models connected properly. Your integration will work at the best shape if you use our ChefSurf api&#39;s to create this data for your restaurant website/app.</p>
<h2 id='user'>User</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">UserSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">Schema</span><span class="p">({</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">role</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'chef'</span><span class="p">,</span> <span class="s1">'staff'</span><span class="p">,</span> <span class="s1">'restaurant_owner'</span><span class="p">,</span> <span class="s1">'client'</span><span class="p">,</span> <span class="s1">'delivery_guy'</span><span class="p">,</span> <span class="s1">'chefsurf_admin'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'client'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">chef</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Chef'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">client</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Client'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">deliveryGuy</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'DeliveryGuy'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">superAdmin</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">Schema</span><span class="p">.</span><span class="nx">Types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'SuperAdmin'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">firstName</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">lastName</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">name</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">username</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">unique</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">phone</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">celullar</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">dob</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Date</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">email</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">unique</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="p">{</span>
            <span class="na">unique</span><span class="p">:</span> <span class="kc">true</span>
        <span class="p">}</span>
    <span class="p">},</span>
    <span class="na">pictureUrl</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">active</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">selectedLanguage</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'english'</span><span class="p">,</span> <span class="s1">'spanish'</span><span class="p">,</span> <span class="s1">'portuguese'</span><span class="p">,</span> <span class="s1">'french'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'spanish'</span>
    <span class="p">},</span>
    <span class="na">password</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">location</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">nationality</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">gender</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'male'</span><span class="p">,</span> <span class="s1">'female'</span><span class="p">,</span> <span class="s1">'none'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'none'</span>
    <span class="p">},</span>
    <span class="na">banned</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">onboardStep</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Number</span>
    <span class="p">},</span>
    <span class="na">onboardType</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'chef'</span><span class="p">,</span> <span class="s1">'restaurant'</span><span class="p">,</span> <span class="s1">'client'</span><span class="p">,</span> <span class="s1">'delivery_guy'</span><span class="p">,</span> <span class="s1">'chefsurf_admin'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'client'</span><span class="p">,</span>
    <span class="p">},</span>
    <span class="na">isEmailVerified</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">isVerified</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">selfCreated</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">googleId</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">facebookId</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">requestToken</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">currency</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span><span class="s1">'cop'</span><span class="p">,</span> <span class="s1">'mxn'</span><span class="p">,</span> <span class="s1">'usd'</span><span class="p">,</span> <span class="s1">'cad'</span><span class="p">],</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'cop'</span>
    <span class="p">},</span>
<span class="p">});</span>
</code></pre><h2 id='wok'>Wok</h2>
<blockquote>
<p>Schema definition</p>
</blockquote>
<pre class="highlight javascript tab-javascript"><code><span class="kd">let</span> <span class="nx">WokSchema</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">mongoose</span><span class="p">.</span><span class="nx">Schema</span><span class="p">({</span>
    <span class="na">restaurant</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Restaurant'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">owner</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Owner'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">index</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">label</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">identifier</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span>
    <span class="p">},</span>
    <span class="na">status</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">enum</span><span class="p">:</span> <span class="p">[</span>
            <span class="s1">'available'</span><span class="p">,</span>
            <span class="s1">'waiting_for_ingredients'</span><span class="p">,</span>
            <span class="s1">'cooking'</span><span class="p">,</span>
            <span class="s1">'dispensing'</span><span class="p">,</span>
            <span class="s1">'cleaning'</span>
        <span class="p">],</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">'available'</span>
    <span class="p">},</span>
    <span class="na">hasErrors</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Boolean</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">errorCode</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">notes</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">String</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="s1">' '</span>
    <span class="p">},</span>
    <span class="na">dish</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nx">ObjectId</span><span class="p">,</span>
        <span class="na">ref</span><span class="p">:</span> <span class="s1">'Dish'</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
        <span class="na">default</span><span class="p">:</span> <span class="kc">null</span>
    <span class="p">},</span>
    <span class="na">temperature</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">},</span>
    <span class="na">cookingTime</span><span class="p">:</span> <span class="p">{</span>
        <span class="na">type</span><span class="p">:</span> <span class="nx">types</span><span class="p">.</span><span class="nb">Number</span><span class="p">,</span>
        <span class="na">required</span><span class="p">:</span> <span class="kc">false</span>
    <span class="p">}</span>
<span class="p">});</span>
</code></pre>
      </div>
      <div class="dark-box">
          <div class="lang-selector">
                <a href="#" data-language-name="javascript (Angular)">javascript (Angular)</a>
          </div>
      </div>
    </div>
  </body>
</html>
