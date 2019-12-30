<?php

?>

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
    <link href="stylesheets/screen-a1ce949a.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print-bccf8c07.css" rel="stylesheet" media="print" />
      <script src="javascripts/all-c5541673.js"></script>
  </head>

  <body class="index" data-languages="[&quot;shell&quot;,&quot;ruby&quot;,&quot;python&quot;,&quot;javascript&quot;]">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar-cad8cdcb.png" alt="Navbar" />
      </span>
    </a>
    <div class="toc-wrapper">
      <img src="images/logo-1e815a84.png" class="logo" alt="Logo" />
        <div class="lang-selector">
              <a href="#" data-language-name="shell">shell</a>
              <a href="#" data-language-name="ruby">ruby</a>
              <a href="#" data-language-name="python">python</a>
              <a href="#" data-language-name="javascript">javascript</a>
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
            <a href="#kittens" class="toc-h1 toc-link" data-title="Kittens">Kittens</a>
              <ul class="toc-list-h2">
                  <li>
                    <a href="#get-all-kittens" class="toc-h2 toc-link" data-title="Get All Kittens">Get All Kittens</a>
                  </li>
                  <li>
                    <a href="#get-a-specific-kitten" class="toc-h2 toc-link" data-title="Get a Specific Kitten">Get a Specific Kitten</a>
                  </li>
                  <li>
                    <a href="#delete-a-specific-kitten" class="toc-h2 toc-link" data-title="Delete a Specific Kitten">Delete a Specific Kitten</a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#errors" class="toc-h1 toc-link" data-title="Errors">Errors</a>
          </li>
      </ul>
        <ul class="toc-footer">
            <li><a href='#'>Sign Up for a Developer Key</a></li>
            <li><a href='https://github.com/lord/slate'>Documentation Powered by Slate</a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
        <h1 id='introduction'>Introduction</h1>
<p>Welcome to the ChefSurf &amp; OpenKitchen API! You can use our API to access Kittn API endpoints, which can get information on various cats, kittens, and breeds in our database.</p>

<p>We have language bindings in Shell, Ruby, Python, and JavaScript! You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.</p>

<p>This example API documentation page was created with <a href="https://github.com/lord/slate">Slate</a>. Feel free to edit it and use it as a base for your own API&#39;s documentation.</p>
<h1 id='authentication'>Authentication</h1>
<blockquote>
<p>To authorize, use this code:</p>
</blockquote>
<pre class="highlight ruby tab-ruby"><code><span class="nb">require</span> <span class="s1">'kittn'</span>

<span class="n">api</span> <span class="o">=</span> <span class="no">Kittn</span><span class="o">::</span><span class="no">APIClient</span><span class="p">.</span><span class="nf">authorize!</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">)</span>
</code></pre><pre class="highlight python tab-python"><code><span class="kn">import</span> <span class="nn">kittn</span>

<span class="n">api</span> <span class="o">=</span> <span class="n">kittn</span><span class="o">.</span><span class="n">authorize</span><span class="p">(</span><span class="s">'meowmeowmeow'</span><span class="p">)</span>
</code></pre><pre class="highlight shell tab-shell"><code><span class="c"># With shell, you can just pass the correct header with each request</span>
curl <span class="s2">"api_endpoint_here"</span>
  -H <span class="s2">"Authorization: meowmeowmeow"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">kittn</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'kittn'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">api</span> <span class="o">=</span> <span class="nx">kittn</span><span class="p">.</span><span class="nx">authorize</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">);</span>
</code></pre>
<blockquote>
<p>Make sure to replace <code>meowmeowmeow</code> with your API key.</p>
</blockquote>

<p>Kittn uses API keys to allow access to the API. You can register a new Kittn API key at our <a href="http://example.com/developers">developer portal</a>.</p>

<p>Kittn expects for the API key to be included in all API requests to the server in a header that looks like the following:</p>

<p><code>Authorization: meowmeowmeow</code></p>

<aside class="notice">
You must replace <code>meowmeowmeow</code> with your personal API key.
</aside>
<h1 id='kittens'>Kittens</h1><h2 id='get-all-kittens'>Get All Kittens</h2><pre class="highlight ruby tab-ruby"><code><span class="nb">require</span> <span class="s1">'kittn'</span>

<span class="n">api</span> <span class="o">=</span> <span class="no">Kittn</span><span class="o">::</span><span class="no">APIClient</span><span class="p">.</span><span class="nf">authorize!</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="p">.</span><span class="nf">kittens</span><span class="p">.</span><span class="nf">get</span>
</code></pre><pre class="highlight python tab-python"><code><span class="kn">import</span> <span class="nn">kittn</span>

<span class="n">api</span> <span class="o">=</span> <span class="n">kittn</span><span class="o">.</span><span class="n">authorize</span><span class="p">(</span><span class="s">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="o">.</span><span class="n">kittens</span><span class="o">.</span><span class="n">get</span><span class="p">()</span>
</code></pre><pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://example.com/api/kittens"</span>
  -H <span class="s2">"Authorization: meowmeowmeow"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">kittn</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'kittn'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">api</span> <span class="o">=</span> <span class="nx">kittn</span><span class="p">.</span><span class="nx">authorize</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">);</span>
<span class="kd">let</span> <span class="nx">kittens</span> <span class="o">=</span> <span class="nx">api</span><span class="p">.</span><span class="nx">kittens</span><span class="p">.</span><span class="nx">get</span><span class="p">();</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fluffums"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"breed"</span><span class="p">:</span><span class="w"> </span><span class="s2">"calico"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"fluffiness"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
    </span><span class="s2">"cuteness"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
    </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Max"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"breed"</span><span class="p">:</span><span class="w"> </span><span class="s2">"unknown"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"fluffiness"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="s2">"cuteness"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves all kittens.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code>GET http://example.com/api/kittens</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>include_cats</td>
<td>false</td>
<td>If set to true, the result will also include cats.</td>
</tr>
<tr>
<td>available</td>
<td>true</td>
<td>If set to false, the result will include kittens that have already been adopted.</td>
</tr>
</tbody></table>

<aside class="success">
Remember — a happy kitten is an authenticated kitten!
</aside>
<h2 id='get-a-specific-kitten'>Get a Specific Kitten</h2><pre class="highlight ruby tab-ruby"><code><span class="nb">require</span> <span class="s1">'kittn'</span>

<span class="n">api</span> <span class="o">=</span> <span class="no">Kittn</span><span class="o">::</span><span class="no">APIClient</span><span class="p">.</span><span class="nf">authorize!</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="p">.</span><span class="nf">kittens</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span>
</code></pre><pre class="highlight python tab-python"><code><span class="kn">import</span> <span class="nn">kittn</span>

<span class="n">api</span> <span class="o">=</span> <span class="n">kittn</span><span class="o">.</span><span class="n">authorize</span><span class="p">(</span><span class="s">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="o">.</span><span class="n">kittens</span><span class="o">.</span><span class="n">get</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span>
</code></pre><pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://example.com/api/kittens/2"</span>
  -H <span class="s2">"Authorization: meowmeowmeow"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">kittn</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'kittn'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">api</span> <span class="o">=</span> <span class="nx">kittn</span><span class="p">.</span><span class="nx">authorize</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">);</span>
<span class="kd">let</span> <span class="nx">max</span> <span class="o">=</span> <span class="nx">api</span><span class="p">.</span><span class="nx">kittens</span><span class="p">.</span><span class="nx">get</span><span class="p">(</span><span class="mi">2</span><span class="p">);</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
  </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Max"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"breed"</span><span class="p">:</span><span class="w"> </span><span class="s2">"unknown"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"fluffiness"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
  </span><span class="s2">"cuteness"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint retrieves a specific kitten.</p>

<aside class="warning">Inside HTML code blocks like this one, you can't use Markdown, so use <code>&lt;code&gt;</code> blocks to denote code.</aside>
<h3 id='http-request-2'>HTTP Request</h3>
<p><code>GET http://example.com/kittens/&lt;ID&gt;</code></p>
<h3 id='url-parameters'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>ID</td>
<td>The ID of the kitten to retrieve</td>
</tr>
</tbody></table>
<h2 id='delete-a-specific-kitten'>Delete a Specific Kitten</h2><pre class="highlight ruby tab-ruby"><code><span class="nb">require</span> <span class="s1">'kittn'</span>

<span class="n">api</span> <span class="o">=</span> <span class="no">Kittn</span><span class="o">::</span><span class="no">APIClient</span><span class="p">.</span><span class="nf">authorize!</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="p">.</span><span class="nf">kittens</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span>
</code></pre><pre class="highlight python tab-python"><code><span class="kn">import</span> <span class="nn">kittn</span>

<span class="n">api</span> <span class="o">=</span> <span class="n">kittn</span><span class="o">.</span><span class="n">authorize</span><span class="p">(</span><span class="s">'meowmeowmeow'</span><span class="p">)</span>
<span class="n">api</span><span class="o">.</span><span class="n">kittens</span><span class="o">.</span><span class="n">delete</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span>
</code></pre><pre class="highlight shell tab-shell"><code>curl <span class="s2">"http://example.com/api/kittens/2"</span>
  -X DELETE
  -H <span class="s2">"Authorization: meowmeowmeow"</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="kr">const</span> <span class="nx">kittn</span> <span class="o">=</span> <span class="nx">require</span><span class="p">(</span><span class="s1">'kittn'</span><span class="p">);</span>

<span class="kd">let</span> <span class="nx">api</span> <span class="o">=</span> <span class="nx">kittn</span><span class="p">.</span><span class="nx">authorize</span><span class="p">(</span><span class="s1">'meowmeowmeow'</span><span class="p">);</span>
<span class="kd">let</span> <span class="nx">max</span> <span class="o">=</span> <span class="nx">api</span><span class="p">.</span><span class="nx">kittens</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="mi">2</span><span class="p">);</span>
</code></pre>
<blockquote>
<p>The above command returns JSON structured like this:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
  </span><span class="s2">"deleted"</span><span class="w"> </span><span class="p">:</span><span class="w"> </span><span class="s2">":("</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>This endpoint deletes a specific kitten.</p>
<h3 id='http-request-3'>HTTP Request</h3>
<p><code>DELETE http://example.com/kittens/&lt;ID&gt;</code></p>
<h3 id='url-parameters-2'>URL Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>ID</td>
<td>The ID of the kitten to delete</td>
</tr>
</tbody></table>
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
                <a href="#" data-language-name="shell">shell</a>
                <a href="#" data-language-name="ruby">ruby</a>
                <a href="#" data-language-name="python">python</a>
                <a href="#" data-language-name="javascript">javascript</a>
          </div>
      </div>
    </div>
  </body>
</html>
