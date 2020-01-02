
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
    <link href="stylesheets/screen-0843bb0d.css" rel="stylesheet" media="screen" />
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
            <a href="#queue-dishes" class="toc-h1 toc-link" data-title="Queue Dishes">Queue Dishes</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-queue-dishes" class="toc-h2 toc-link" data-title="Get Queue Dishes">Get Queue Dishes</a>
                  </li>
                  <li>
                    <a href="#get-a-queue-dish" class="toc-h2 toc-link" data-title="Get a Queue Dish">Get a Queue Dish</a>
                  </li>
                  <li>
                    <a href="#update-queue-dish" class="toc-h2 toc-link" data-title="Update Queue Dish">Update Queue Dish</a>
                  </li>
                  <li>
                    <a href="#delete-queue-dish" class="toc-h2 toc-link" data-title="Delete Queue Dish">Delete Queue Dish</a>
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
            <a href="#errors" class="toc-h1 toc-link" data-title="Errors">Errors</a>
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
<h1 id='queue-dishes'>Queue Dishes</h1><h2 id='get-queue-dishes'>Get Queue Dishes</h2><pre class="highlight javascript tab-javascript"><code><span class="kr">import</span> <span class="p">{</span>
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
<h2 id='get-a-queue-dish'>Get a Queue Dish</h2>
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
<h2 id='update-queue-dish'>Update Queue Dish</h2>
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
<h2 id='delete-queue-dish'>Delete Queue Dish</h2>
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
 * @param {Object} params | this property is optional, it's to add additional query params before deleting the queue dish in case you want to don't delete it on certain conditions
*/</span>
<span class="nx">deleteQueueDish</span><span class="p">(</span><span class="nx">queue_dish_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">queue_dish_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
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
 * @param {Object} params | this property is optional, it's to add additional query params before deleting the wok in case you want to don't delete it on certain conditions
*/</span>
<span class="nx">deleteWok</span><span class="p">(</span><span class="nx">wok_id</span><span class="p">,</span> <span class="nx">params</span><span class="p">)</span> <span class="p">{</span>
  <span class="k">return</span> <span class="k">this</span><span class="p">.</span><span class="nx">http</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="s2">`</span><span class="p">${</span><span class="nx">path</span><span class="p">}</span><span class="s2">/</span><span class="p">${</span><span class="nx">wok_id</span><span class="p">}</span><span class="s2">`</span><span class="p">,</span> <span class="p">{</span>
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
<h1 id='errors'>Errors</h1>
<aside class="notice">
This error section is stored in a separate file in <code>includes/_errors.md</code>. Slate allows you to optionally separate out your docs into many files...just save them to the <code>includes</code> folder and add them to the top of your <code>index.md</code>'s frontmatter. Files are included in the order listed.
</aside>

<p>The Kittn API uses the following error codes:</p>

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
<td>Unauthorized -- Your API key is wrong.</td>
</tr>
<tr>
<td>403</td>
<td>Forbidden -- The kitten requested is hidden for administrators only.</td>
</tr>
<tr>
<td>404</td>
<td>Not Found -- The specified kitten could not be found.</td>
</tr>
<tr>
<td>405</td>
<td>Method Not Allowed -- You tried to access a kitten with an invalid method.</td>
</tr>
<tr>
<td>406</td>
<td>Not Acceptable -- You requested a format that isn&#39;t json.</td>
</tr>
<tr>
<td>410</td>
<td>Gone -- The kitten requested has been removed from our servers.</td>
</tr>
<tr>
<td>418</td>
<td>I&#39;m a teapot.</td>
</tr>
<tr>
<td>429</td>
<td>Too Many Requests -- You&#39;re requesting too many kittens! Slow down!</td>
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

      </div>
      <div class="dark-box">
          <div class="lang-selector">
                <a href="#" data-language-name="javascript (Angular)">javascript (Angular)</a>
          </div>
      </div>
    </div>
  </body>
</html>
