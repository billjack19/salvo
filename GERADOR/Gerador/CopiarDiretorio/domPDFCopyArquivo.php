<?php

criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar");

copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/falha_recarregar.php");
copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/index.php");


include "dompdf/__copyArquivo.php";
// /*********************************************/
// criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/_travis.yml");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/autoload.inc.php");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/composer.json");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/CONTRIBUTING.md");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/LICENSE.LGPL");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/phpcs.xml");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/phpunit.xml.dist");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/README.md");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/VERSION");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/Cpdf.php");
// 		/**********************************************/
// 		criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/fonts");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Courier-Bold.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Courier-BoldOblique.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Courier-Oblique.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Courier.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-Bold.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-Bold.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-BoldOblique.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-BoldOblique.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-Oblique.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans-Oblique.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSans.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-Bold.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-Bold.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-BoldOblique.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-BoldOblique.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-Oblique.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono-Oblique.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSansMono.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-Bold.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-Bold.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-BoldItalic.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-BoldItalic.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-Italic.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif-Italic.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif.ttf");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/DejaVuSerif.ufm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/dompdf_font_family_cache.dist.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-Bold.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-Bold.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-BoldOblique.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-BoldOblique.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-Oblique.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica-Oblique.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Helvetica.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/mustRead.html");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Symbol.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-Bold.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-Bold.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-BoldItalic.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-Italic.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-Roman.afm");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/Times-Roman.afm.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/fonts/ZapfDingbats.afm");
// 		/**********************************************/
// 		criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/html5lib");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/Data.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/InputStream.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/named-character-references.ser");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/Parser.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/Tokenizer.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/html5lib/TreeBuilder.php");
// 		/**********************************************/
// 		criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/_htaccess");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/_travis.yml");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/bower.json");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/composer.json");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/index.php");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/LICENSE");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/phpunit.xml.dist");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/README.md");

// /**********************************************/
// criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/maps");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/adobe-standard-encoding.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1250.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1251.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1252.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1253.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1254.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1255.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1257.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp1258.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/cp874.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-1.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-11.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-15.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-16.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-2.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-4.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-5.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-7.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/iso-8859-9.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/koi8-r.map");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/maps/koi8-u.map");
// /**********************************************/
// criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/sample-fonts");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/sample-fonts/IntelClear-Light.ttf");
// /**********************************************/
// criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/AdobeFontMetrics.php");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/BinaryStream.php");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/EncodingMap.php");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Font.php");
// copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Header.php");


// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/EOT");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/EOT/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Exception");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Exception/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Glyph");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Glyph/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/OpenType");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/OpenType/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Table");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/Table/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/TrueType");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/TrueType/Cpdf");
// 	/**********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/WOFF");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/src/FontLib/WOFF/Cpdf");

// /**********************************************/
// criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-font-lib/tests");
// 	copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-font-lib/tests/Cpdf");


// 		/**********************************************/
// 		criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/php-svg-lib");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/php-svg-lib/Cpdf");
// 		/**********************************************/
// 		criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/lib/res");
// 			copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/dompdf/lib/res/Cpdf");
// 	/***********************************************/
// 	criarDiretorio("../GeradorProjetos/$projetoNome/app/dompdf_gerar/dompdf/src");

// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/charts");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/jQuery");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/masked");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/masked2");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/maskmoney");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/moment");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/scripts");
// 		copiarArquivo("Modelo2", "../GeradorProjetos/".$projetoNome, "app/dompdf_gerar/toast");

// criarDiretorio("../GeradorProjetos/$projetoNome/app/css/font-awesome");
?>