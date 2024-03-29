<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Techmania</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="images/Techmania.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen, projection" />
</head>
<body>
<div id="wrap">
  <div id="header">
    <h1 id="logo-text">tech<span class="gray">mania</span></h1>
    <h2 id="slogan">put your site slogan here...</h2>
    <div id="header-tabs">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
            'linkLabelWrapper' => 'span'
		)); ?>
    </div>
  </div>
  <div id="content-wrap">
    <div id="main"> 
        <?php echo $content; ?>
    <!-- MORE EXAMPLE BELOW
    <a name="TemplateInfo"></a>
      <h1>Template Info</h1>
      <p><strong>Techmania 1.1</strong> is a free, W3C-compliant, CSS-based website template by <strong>styleshout.com</strong>. This work is distributed under the <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by/2.5/"> Creative Commons Attribution 2.5 License</a>, which means that you are free to use and modify it for any purpose. All I ask is that you include a link back to my website in your credits.</p>
      <p>For more free designs, you can visit my website to see my other works.</p>
      <p>Good luck and I hope you find my free templates useful!</p>
      <p class="comments align-right"> <a href="http://www.free-css.com/">Read more</a> : <a href="http://www.free-css.com/">Comments(7)</a> : Oct 08, 2006 </p>
      <a name="SampleTags"></a>
      <h1>Sample Tags</h1>
      <h3>Code</h3>
      <p><code> code-sample { <br />
        font-weight: bold;<br />
        font-style: italic;<br />
        } </code></p>
      <h3>Example Lists</h3>
      <ol>
        <li><span>example of ordered list</span></li>
        <li><span>uses span to color the numbers</span></li>
      </ol>
      <ul>
        <li><span>example of unordered list</span></li>
        <li><span>uses span to color the bullets</span></li>
      </ul>
      <h3>Blockquote</h3>
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p>
      </blockquote>
      <h3>Image and text</h3>
      <p><a href="http://www.free-css.com/"><img src="images/firefox-gray.jpg" width="100" height="120" alt="firefox" class="float-left" /></a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est. </p>
      <h3>Example Form</h3>
      <form action="http://www.free-css.com/">
        <p>
          <label>Name</label>
          <input name="dname" value="Your Name" type="text" size="30" />
          <label>Email</label>
          <input name="demail" value="Your Email" type="text" size="30" />
          <label>Your Comments</label>
          <textarea rows="5" cols="5"></textarea>
          <br />
          <input class="button" type="submit" />
        </p>
      </form>
      <br />
      -->
    </div>
    <div id="sidebar">
      <h1>Sidebar Menu</h1>
      <ul class="sidemenu">
        <li><a href="http://www.free-css.com/">Home</a></li>
        <li><a href="#TemplateInfo">Template Info</a></li>
        <li><a href="#SampleTags">Sample Tags</a></li>
        <li><a href="http://www.free-css.com/">More Free Templates</a></li>
        <li><a href="http://www.free-css.com/">Premium Templates</a></li>
      </ul>
      <h1>Site Partners</h1>
      <ul class="sidemenu">
        <li><a href="http://www.free-css.com/">Dreamhost</a></li>
        <li><a href="http://www.free-css.com/">4templates</a></li>
        <li><a href="http://www.free-css.com/">TemplateMonster</a></li>
        <li><a href="http://www.free-css.com/">Fotolia.com</a></li>
        <li><a href="http://www.free-css.com/">Text Link Ads</a></li>
      </ul>
      <h1>Search</h1>
      <form method="post" id="search" action="http://www.free-css.com/">
        <p>
          <input name="search_query" class="textbox" type="text" />
          <input name="search" class="searchbutton" value="Search" type="submit" />
        </p>
      </form>
      <h1>Wise Words</h1>
      <p>&quot;Criticism is something you can avoid easily by saying nothing, doing nothing, and being nothing&quot;</p>
      <p class="align-right">- Aristotle</p>
      <h1>Support Styleshout</h1>
      <p>If you are interested in supporting my work and would like to contribute, you are welcome to make a small donation through the donate link on my website - it will be a great help and will surely be appreciated.</p>
    </div>
  </div>
  <div id="footer"> <span id="footer-left"> &copy; <?php echo date( 'Y', time() ); ?> <strong><?php echo CHtml::encode( Yii::app()->name ); ?></strong> | Design by: <strong><a href="http://www.styleshout.com/">styleshout</a></strong> | Valid: <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> </span> <span id="footer-right"> <a href="http://www.free-css.com/">Home</a> | <a href="http://www.free-css.com/">Sitemap</a> | <a href="http://www.free-css.com/">Home</a> </span> </div>
</div>
</body>
</html>
