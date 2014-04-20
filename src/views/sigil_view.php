<!doctype html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
  <title>印记城</title>
  
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
  <link rel="stylesheet" href="css/style.css" />

  <!-- scripts at bottom of page -->

</head>
<body class="homepage ">
  <section id="content">
    <section id="options" class="clearfix">
      <div class="option-combo">
        <input class="search width-l" placeholder="搜索 _(:3」∠)_"/>
        <button class="btn" type="submit">搜索</button>
      </div>
    </section>
    <?php  
      //var_dump($main);
    ?>
  </section>

  <div id="container" class="super-list variable-sizes clearfix">  
    <?php
      foreach ($main as $key => $value) {
    ?>
      <div class="element metal <?php echo $value->coverWidth; ?> " style="height:<?php echo $value->coverHeight; ?>px;" data-number="<?php echo $value->dataNumber; ?>">
        <img class="comic <?php echo $value->coverWidth; ?>" src="<?php echo $value->coverPath; ?>"/>
      </div>
    <?php
      }
    ?>        
    <!-- <div class="element alkaline-earth metal  height2 " style="height:154px;" data-symbol="Mg" data-category="alkaline-earth">
    	<img class="comic width" src="update_comic/VOL00/0007.jpg"/>
      <div class="bg width">xxxx</div>
    </div>
    
    <div class="element width2" data-number="92" data-symbol="U" data-category="actinoid" data-name="Uranium">
    	<img class="comic width2" src="update_comic/VOL01/Vol_01_0001.jpg"/>
    </div>
    
          
    <div class="element actinoid metal inner-transition   " data-symbol="U" data-category="actinoid">
      <img class="comic width" src="update_comic/VOL01/Vol_01_0002.jpg"/>

    </div>
    <div class="element feature alkali width2 height2" style="height:327px;">
    	
      <img class="comic width2" src="update_comic/VOL00/0024.jpg"/>
      <div class="bg width2">xxxx</div>
    </div>
      
          
    <div class="element lanthanoid metal inner-transition   " data-symbol="Gd" data-category="lanthanoid">
      <img class="comic2" src="update_comic/VOL00/0000.jpg"/>
    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Y" data-category="transition">
      <img class="comic2" src="update_comic/VOL00/0005.jpg"/>
    </div>
    
      
          
    <div class="element metalloid   " data-symbol="B" data-category="metalloid">
       <img class="comic2" src="update_comic/VOL00/0020.jpg"/>
    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Fe" data-category="transition">
      <img class="comic2" src="update_comic/VOL00/0023.jpg"/>
    </div>

    <div class="element feature transition width2 height2">
	    <img class="comic4" src="update_comic/VOL00/0005.jpg"/>
	  </div>
    
      
          
    <div class="element actinoid metal inner-transition   " data-symbol="Am" data-category="actinoid">
      <img class="comic2" src="update_comic/VOL00/0006.jpg"/>
    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Zn" data-category="transition">
      <img class="comic2" src="update_comic/VOL00/0008.jpg"/>
    </div>
    
      
          
    <div class="element lanthanoid metal inner-transition   " data-symbol="Pm" data-category="lanthanoid">
      <img class="comic2" src="update_comic/VOL00/0009.jpg"/>
    </div>
    
      
          
    <div class="element post-transition metal   " data-symbol="In" data-category="post-transition">
      <img class="comic2" src="update_comic/VOL00/0010.jpg"/>
    </div>
    
      
          
    <div class="element metalloid   " data-symbol="As" data-category="metalloid">
      <img class="comic2" src="update_comic/VOL00/0011.jpg"/>
    </div>
    
      
          
    <div class="element lanthanoid metal inner-transition   " data-symbol="Er" data-category="lanthanoid">
      <img class="comic2" src="update_comic/VOL00/0012.jpg"/>
    </div>
    
      
          
    <div class="element other nonmetal   " data-symbol="Se" data-category="other">
      <img class="comic2" src="update_comic/VOL00/0013.jpg"/>
    </div>
    
      
          
    <div class="element alkaline-earth metal   " data-symbol="Sr" data-category="alkaline-earth">
      <img class="comic2" src="update_comic/VOL00/0014.jpg"/>
    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Zr" data-category="transition">
      <img class="comic2" src="update_comic/VOL00/0015.jpg"/>
    </div>
    
      
          
    <div class="element halogen nonmetal   " data-symbol="At" data-category="halogen">
      <img class="comic2" src="update_comic/VOL00/0016.jpg"/>    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Nb" data-category="transition">
      <img class="comic2" src="update_comic/VOL00/0017.jpg"/>
    </div>
    
      
          
    <div class="element other nonmetal   " data-symbol="O" data-category="other">
      <img class="comic2" src="update_comic/VOL00/0018.jpg"/>
    </div>
    
      
          
    <div class="element actinoid metal inner-transition   " data-symbol="Bk" data-category="actinoid">
      <img class="comic2" src="update_comic/VOL00/0019.jpg"/>
    </div>
    
      
          
    <div class="element halogen nonmetal   " data-symbol="F" data-category="halogen">
      <img class="comic2" src="update_comic/VOL00/0021.jpg"/>
    </div>
    
      
          
    <div class="element actinoid metal inner-transition   " data-symbol="Cf" data-category="actinoid">
     <img class="comic2" src="update_comic/VOL00/0022.jpg"/>
    </div>
    
      
          
    <div class="element noble-gas nonmetal   " data-symbol="Ne" data-category="noble-gas">
      <p class="number">10</p>
      <h3 class="symbol">Ne</h3>
      <h2 class="name">Neon</h2>
      <p class="weight">20.1797</p>
    </div>
    
      
          
    <div class="element other nonmetal   " data-symbol="P" data-category="other">
      <p class="number">15</p>
      <h3 class="symbol">P</h3>
      <h2 class="name">Phosphorus</h2>
      <p class="weight">30.973762</p>
    </div>
    
      
          
    <div class="element actinoid metal inner-transition   " data-symbol="Fm" data-category="actinoid">
      <p class="number">100</p>
      <h3 class="symbol">Fm</h3>
      <h2 class="name">Fermium</h2>
      <p class="weight">(257)</p>
    </div>
    
      
          
    <div class="element other nonmetal   " data-symbol="S" data-category="other">
      <p class="number">16</p>
      <h3 class="symbol">S</h3>
      <h2 class="name">Sulfur</h2>
      <p class="weight">32.065</p>
    </div>
    
      
          
    <div class="element alkaline-earth metal   " data-symbol="Ca" data-category="alkaline-earth">
      <p class="number">20</p>
      <h3 class="symbol">Ca</h3>
      <h2 class="name">Calcium</h2>
      <p class="weight">40.078</p>
    </div>
    
      
          
    <div class="element other nonmetal   " data-symbol="C" data-category="other">
      <p class="number">6</p>
      <h3 class="symbol">C</h3>
      <h2 class="name">Carbon</h2>
      <p class="weight">12.0107</p>
    </div>
    
      
          
    <div class="element alkali metal   " data-symbol="Rb" data-category="alkali">
      <p class="number">37</p>
      <h3 class="symbol">Rb</h3>
      <h2 class="name">Rubidium</h2>
      <p class="weight">85.4678</p>
    </div>
    
      
          
    <div class="element post-transition metal   " data-symbol="Uup" data-category="post-transition">
      <p class="number">115</p>
      <h3 class="symbol">Uup</h3>
      <h2 class="name">Ununpentium</h2>
      <p class="weight">(288)</p>
    </div>
    
      
          
    <div class="element transition metal   " data-symbol="Sc" data-category="transition">
      <p class="number">21</p>
      <h3 class="symbol">Sc</h3>
      <h2 class="name">Scandium</h2>
      <p class="weight">44.955912</p>
    </div>
    
    

    
      <div class="element feature actinoid width2 height2">
        <img class="comic4" src="update_comic/VOL01/Vol_01_0002.jpg"/>
      </div>
    
      <div class="element feature lanthanoid width2 height2">
        <p class="number">27</p>
        <h3 class="symbol">Srt</h3>
        <h2 class="name">Re&ndash;order items with&nbsp;sorting</h2>
      </div>
    
      <div class="element feature metalloid width2 height2">
        <p class="number">61</p>
        <h3 class="symbol">Pow</h3>
        <h2 class="name">Powerful methods, simple&nbsp;syntax</h2>
      </div>
    
      <div class="element feature alkaline-earth width2 height2">
        <p class="number">11</p>
        <h3 class="symbol">Flt</h3>
        <h2 class="name">Reveal &amp; hide items with&nbsp;filtering</h2>
      </div>
    
      
    
      <div class="element feature halogen width2 height2">
        <p class="number">71</p>
        <h3 class="symbol">Pro</h3>
        <h2 class="name">Progressively enhanced for CSS3 transforms &amp;&nbsp;transitions</h2>
      </div>
    
      <div class="element feature post-transition width2 height2">
        <p class="number">51</p>
        <h3 class="symbol">Any</h3>
        <h2 class="name">Sort items by just about&nbsp;anything</h2>
      </div> -->
    
    <!-- <div class="link" data-number="5"><a href="jquery.isotope.min.js">Down&#8203;load jquery&#8203;.isotope&#8203;.min.js</a></div>
    <div class="link" data-number="13"><a href="http://meta.metafizzy.co/files/isotope-site.zip">Down&#8203;load this project</a></div> 
    <div class="link away" data-number="35"><a href="http://github.com/desandro/isotope">Isotope on GitHub</a></div> -->
  </div>

  <div id="sites"></div>
  
  
  <script src="js/jquery-1.7.1.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/sigil_main.js"></script>

    
    <footer>
      Isotope by <a href="http://desandro.com">David DeSandro</a> / <a href="http://metafizzy.co">Metafizzy</a>
    </footer>
    
  </section> <!-- #content -->
  

</body>
</html>