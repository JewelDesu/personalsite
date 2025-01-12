<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Crystic</title>
		<meta charset="UTF-8" />
		<meta name="title" content="crystic" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="My protfolio" />
		<meta name="keywords" content="crystic, big chungus, "/>
		<meta name="theme-color" content="#684364">
		<meta name="twitter:site" content="@_Crystic_">
		<meta name="twitter:title" content="Crystic">
		<meta name="twitter:description" content="Chunging">
		<meta name="twitter:image" content="https://pbs.twimg.com/profile_images/1705605034279309313/HNHtwh1t_400x400.jpg">
		<meta property="og:title" content="skhf" />
		<meta property="og:type" content="website">
		<meta property="og:description" content="Crystic's site" />
		<meta property="og:url" content="https://www.cry.red" />
		<meta property="og:image" content="https://www.cry.red/img/shum.jpg" />
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<link rel="shortcut icon" href="/img/heh.jpg" type="image/jpg" />
		<link rel="stylesheet" href="style.css" />
		<script src="/title-scroll.js" data-start="0" data-speed="10"></script>
	</head>

	<body>
		<main>

		<div>
			
			<fieldset id="fieldset1">

				<legend style="font-size: 30px;">
					Info
				</legend>
				<div id="buttonsnoimg">
					<a class="links" href="index.html"> home </a>
					<a class="linkscurrent" href="info.html"> projects </a>
					<a class="links" href="youtube.com"> lingus </a>
					<a class="links" href="youtube.com"> lingus </a>
				</div>
				<div>

				</div>

                <table class="sortable">
                    <thead>
                      <tr>
                        <th>Filename</th>
                        <th>Type</th>
                        <th>Size <small>(bytes)</small></th>
                        <th>Date Modified</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // Opens directory
                      $myDirectory=opendir(".");
                      
                      // Gets each entry
                      while($entryName=readdir($myDirectory)) {
                        $dirArray[]=$entryName;
                      }
                      
                      // Finds extensions of files
                      function findexts ($filename) {
                        $filename=strtolower($filename);
                        $exts=split("[/\\.]", $filename);
                        $n=count($exts)-1;
                        $exts=$exts[$n];
                        return $exts;
                      }
                      
                      // Closes directory
                      closedir($myDirectory);
                      
                      // Counts elements in array
                      $indexCount=count($dirArray);
                      
                      // Sorts files
                      sort($dirArray);
                      
                      // Loops through the array of files
                      for($index=0; $index < $indexCount; $index++) {
                      
                        // Allows ./?hidden to show hidden files
                        if($_SERVER['QUERY_STRING']=="hidden")
                        {$hide="";
                        $ahref="./";
                        $atext="Hide";}
                        else
                        {$hide=".";
                        $ahref="./?hidden";
                        $atext="Show";}
                        if(substr("$dirArray[$index]", 0, 1) != $hide) {
                        
                        // Gets File Names
                        $name=$dirArray[$index];
                        $namehref=$dirArray[$index];
                        
                        // Gets Extensions 
                        $extn=findexts($dirArray[$index]); 
                        
                        // Gets file size 
                        $size=number_format(filesize($dirArray[$index]));
                        
                        // Gets Date Modified Data
                        $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
                        $timekey=date("YmdHis", filemtime($dirArray[$index]));
                        
                        // Prettifies File Types, add more to suit your needs.
                        switch ($extn){
                          case "png": $extn="PNG Image"; break;
                          case "jpg": $extn="JPEG Image"; break;
                          case "svg": $extn="SVG Image"; break;
                          case "gif": $extn="GIF Image"; break;
                          case "ico": $extn="Windows Icon"; break;
                          
                          case "txt": $extn="Text File"; break;
                          case "log": $extn="Log File"; break;
                          case "htm": $extn="HTML File"; break;
                          case "php": $extn="PHP Script"; break;
                          case "js": $extn="Javascript"; break;
                          case "css": $extn="Stylesheet"; break;
                          case "pdf": $extn="PDF Document"; break;
                          
                          case "zip": $extn="ZIP Archive"; break;
                          case "bak": $extn="Backup File"; break;
                          
                          default: $extn=strtoupper($extn)." File"; break;
                        }
                        
                        // Separates directories
                        if(is_dir($dirArray[$index])) {
                          $extn="&lt;Directory&gt;"; 
                          $size="&lt;Directory&gt;"; 
                          $class="dir";
                        } else {
                          $class="file";
                        }
                        
                        // Cleans up . and .. directories 
                        if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
                        if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
                        
                        // Print 'em
                        print("
                        <tr class='$class'>
                          <td><a href='./$namehref'>$name</a></td>
                          <td><a href='./$namehref'>$extn</a></td>
                          <td><a href='./$namehref'>$size</a></td>
                          <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
                        </tr>");
                        }
                      }
                    ?>
                    </tbody>
                  </table>
                  <h2><?php print("<a href='$ahref'>$atext hidden files</a>"); ?></h2>

		</fieldset>
		<a href="https://www.youtube.com/watch?v=nvVct6RxQuo&list=FLPMrRbU3RecXBFqa8bIwJOQ&index=336" id="cover-image-container" class="image-container">
		</a>
	</div>
		</main>

		<footer>
			&#10084; sleeper
		</footer>
	
	</body>

</html>