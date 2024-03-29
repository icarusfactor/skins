<?php
/**
 * Cologne Blue: A nicer-looking alternative to Standard.
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

/**
 * @todo document
 * @ingroup Skins
 */
class SkinCologneBlue extends SkinLegacy {
	var $skinname = 'cologneblue', $stylename = 'cologneblue',
		$template = 'CologneBlueTemplate';

	/**
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ){
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( 'skins.cologneblue' );

		$qb = $this->qbSetting();
		$rules = array();

		if ( 2 == $qb ) { # Right
			//$rules[] = "/* @noflip */#quickbar { position: absolute; right: 4px; }";
			//$rules[] = "/* @noflip */#article { margin-left: 4px; margin-right: 148px; }";
			//$rules[] = "/* @noflip */#footer { margin-right: 152px; }";

                        $rules[] = "/* @noflip */#article { margin-left: 20px; margin-right: 20px; }";
			$rules[] = "/* @noflip */#footer { margin-right: 20px; }";

		} elseif ( 1 == $qb ) {
			//$rules[] = "/* @noflip */#quickbar { position: absolute; left: 4px; }";
			//$rules[] = "/* @noflip */#article { margin-left: 148px; margin-right: 4px; }";
			//$rules[] = "/* @noflip */#footer { margin-left: 152px; }";

                        $rules[] = "/* @noflip */#article { margin-left: 20px; margin-right: 20px; }";
			$rules[] = "/* @noflip */#footer { margin-right: 20px; }";



		} elseif ( 3 == $qb ) { # Floating left
			//$rules[] = "/* @noflip */#quickbar { position:absolute; left:4px }";
			//$rules[] = "/* @noflip */#topbar { margin-left: 148px }";
			//$rules[] = "/* @noflip */#article { margin-left:148px; margin-right: 4px; }";
			//$rules[] = "/* @noflip */body>#quickbar { position:fixed; left:4px; top:4px; overflow:auto; bottom:4px;}"; # Hides from IE
			//$rules[] = "/* @noflip */#footer { margin-left: 152px; }";

                        $rules[] = "/* @noflip */#topbar { margin-left:  20px }";
                        $rules[] = "/* @noflip */#article { margin-left: 20px; margin-right: 20px; }";
			$rules[] = "/* @noflip */#footer { margin-right: 20px; }"; 
                        

		} elseif ( 4 == $qb ) { # Floating right
			//$rules[] = "/* @noflip */#quickbar { position: fixed; right: 4px; }";
			//$rules[] = "/* @noflip */#topbar { margin-right: 148px }";
			//$rules[] = "/* @noflip */#article { margin-right: 148px; margin-left: 4px; }";
			//$rules[] = "/* @noflip */body>#quickbar { position: fixed; right: 4px; top: 4px; overflow: auto; bottom:4px;}"; # Hides from IE
			//$rules[] = "/* @noflip */#footer { margin-right: 152px; }";

                        $rules[] = "/* @noflip */#topbar { margin-right: 148px }";
                        $rules[] = "/* @noflip */#article { margin-left: 20px; margin-right: 20px; }";
			$rules[] = "/* @noflip */#footer { margin-right: 20px; }";                          

		}
		$style = implode( "\n", $rules );
		$out->addInlineStyle( $style, 'flip' );
	}

}

class CologneBlueTemplate extends LegacyTemplate {

	/**
	 * @return string
	 */
	function doBeforeContent() {
		$mainPageObj = Title::newMainPage();

		$s = "\n<div id='content'>\n<div id='topbar'>" .
		  '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';

		$s .= '<td class="top" nowrap="nowrap" COLSPAN="2" width="100%">';
		//$s .= '<a href="' . htmlspecialchars( $mainPageObj->getLocalURL() ) . '">';
		//$s .= '<span id="sitetitle">' . wfMsg( 'sitetitle' ) . '</span></a>';
                $s .= '<div style="height:214px;width:100%;margin:0px;padding:0px;" ><IMG src="/images/userspace_header.png" ></div>';

		$s .= '</td> <TR> <td class="top" COLSPAN="2" id="top-syslinks" width="100%">';
		$s .= $this->sysLinks();
		//$s .= '</td> <TR> </tr><tr><td class="top-subheader">';
                $s .= '</td> <TR> </tr>';

		//$s .= '<font size="-1"><span id="sitesub">';
		//$s .= htmlspecialchars( wfMsg( 'sitesubtitle' ) ) . '</span></font>'; 
                
		//$s .= '</td><td class="top-linkcollection">';
                //$s .= '<td class="top-linkcollection">';

		//$s .= '<font size="-1"><span id="langlinks">';
		//$s .= str_replace( '<br />', '', $this->otherLanguages() );

		//$s .= $this->getSkin()->getCategories();

		//$s .= '<br /><IMG SRC="/images/ucuso.jpg"><BR />'. $this->pageTitleLinks();
                //$s .= '<br />'. $this->pageTitleLinks();                 

		//$s .= '</span></font>';

		//$s .= "</td></tr></table>\n";
                $s .= "</table>\n";

		$s .= "\n</div>\n<div id='article'>";

		$notice = $this->getSkin()->getSiteNotice();
		if( $notice ) {
			$s .= "\n<div id='siteNotice'>$notice</div>\n";
		}
		$s .= $this->pageTitle();
		$s .= $this->pageSubtitle() . "\n";
		return $s;
	}

	/**
	 * @return string
	 */
	function doAfterContent(){
		$s = "\n</div><br clear='all' />\n";
                                
                $s .= "\n<div id='footer'>";

                $s .= "\n<div id='footerimage'>";
                $s .= "\n</div>";
                
                $s .= '<div id="footerlinks" >'; 
                //$s .= $this->bottomLinks();                
                $s .= $this->getSkin()->getCategories();
                $s .= '</div>'; 

                $s .= '<div id="footerlinks" >'; 
                $s .= '<CENTER>';

                if ( $this->getSkin()->qbSetting() != 0 ) {
			$s .= $this->quickBar();
		}

                $s .= '</CENTER>'; 
                $s .= '</div>'; 


		//$s .= "\n<div id='footer'>";
		$s .= '<table width="98%" border="0" cellspacing="0"><tr>';

                

               
                $s .= '<td class="bottom">';

                
		$s .= $this->getSkin()->getLanguage()->pipeList( array(
			"\n<br />" . Linker::link(
				Title::newMainPage(),
				null,
				array(),
				array(),
				array( 'known', 'noclasses' )
			),
			$this->getSkin()->aboutLink(),
			$this->searchForm( wfMsg( 'qbfind' ) )
		) );

		$s .= "\n<br />" . $this->pageStats();

		$s .= '</td>';
		$s .= "</tr></table>\n</div>\n</div>\n";

		//if ( $this->getSkin()->qbSetting() != 0 ) {
		//	$s .= $this->quickBar();
		//}
		return $s;
	}

	/**
	 * @return string
	 */
	function sysLinks() {
		$li = SpecialPage::getTitleFor( 'Userlogin' );
		$lo = SpecialPage::getTitleFor( 'Userlogout' );

		$rt = $this->getSkin()->getTitle()->getPrefixedURL();
		if ( 0 == strcasecmp( urlencode( $lo ), $rt ) ) {
			$q = array();
		} else {
			$q = array( 'returnto' => $rt );
		}

		$s = array(
			$this->getSkin()->mainPageLink(),
			Linker::linkKnown(
				Title::newFromText( wfMsgForContent( 'aboutpage' ) ),
				wfMsg( 'about' )
			),
			Linker::linkKnown(
				Title::newFromText( wfMsgForContent( 'helppage' ) ),
				wfMsg( 'help' )
			),
			Linker::linkKnown(
				Title::newFromText( wfMsgForContent( 'faqpage' ) ),
				wfMsg( 'faq' )
			),
			Linker::specialLink( 'Specialpages' )
		);

		/* show links to different language variants */
		if( $this->variantLinks() ) {
			$s[] = $this->variantLinks();
		}
		if( $this->extensionTabLinks() ) {
			$s[] = $this->extensionTabLinks();
		}
		//if ( $this->data['loggedin'] ) {
		//	$s[] = Linker::linkKnown(
		//		$lo,
		//		wfMsg( 'logout' ),
		//		array(),
		//		$q
		//	);
		//} else {
		//	$s[] = Linker::linkKnown(
		//		$li,
		//		wfMsg( 'login' ),
		//		array(),
		//		$q
		//	);
		//}

		return $this->getSkin()->getLanguage()->pipeList( $s );
	}



       /**
	 * Compute the sidebar
	 * @access private
	 *
	 * @return string
	 */
	function quickBar(){
		$s = "\n<div id='quickbar'>";

                //$s = '<table id="bottombar" width="100%" border="0" cellspacing="0" cellpadding="8"><td>';



		$sep = '<br />';


		$barnumber = 1;
		foreach ( $bar as $heading => $browseLinks ) {
			if ( $barnumber > 1 ) {
				$headingMsg = wfMessage( $heading );
				if ( $headingMsg->exists() ) {
					$h = $headingMsg->text();
				} else {
					$h = $heading;
				}
				$s .= "\n<h6>" . htmlspecialchars( $h ) . "</h6>";
			}
			if( is_array( $browseLinks ) ) {
				foreach ( $browseLinks as $link ) {
					if ( $link['text'] != '-' ) {
						$s .= "<a href=\"{$link['href']}\">" .
							htmlspecialchars( $link['text'] ) . '</a>' . $sep;
					}
				}
			}
			$barnumber++;
		}



                $user = $this->getSkin()->getUser();
// added for article start
                        $s .= '<div style="width: 150px;margin:10px;float:left;" >';
                        if ( $this->data['isarticle'] ) {
			$s .= $this->menuHead( 'qbedit' );
			$s .= '<strong>' . $this->editThisPage() . '</strong>';

			$s .= $sep . Linker::linkKnown(
				Title::newFromText( wfMsgForContent( 'edithelppage' ) ),
				wfMsg( 'edithelp' )
			);

			if( $this->data['loggedin'] ) {
				$s .= $sep . $this->moveThisPage();
			}
			if ( $user->isAllowed( 'delete' ) ) {
				$dtp = $this->deleteThisPage();
				if ( $dtp != '' ) {
					$s .= $sep . $dtp;
				}
			}
			if ( $user->isAllowed( 'protect' ) ) {
				$ptp = $this->protectThisPage();
				if ( $ptp != '' ) {
					$s .= $sep . $ptp;
				}
			}
			$s .= $sep;
                        $s .= '</div>';
                        $s .= '<div style="width: 150px;margin:10px;float:left;" >';


			$s .= $this->menuHead( 'qbpageoptions' );
			$s .= $this->talkLink()
					. $sep . $this->commentLink()
					. $sep . $this->printableLink();
			if ( $this->data['loggedin'] ) {
				$s .= $sep . $this->watchThisPage();
			}

			$s .= $sep;
                        $s .= '</div>';
                        $s .= '<div style="width: 150px;margin:10px;float:left;" >';

			$s .= $this->menuHead( 'qbpageinfo' )
					. $this->historyLink()
					. $sep . $this->whatLinksHere()
					. $sep . $this->watchPageLinksLink();

			$title = $this->getSkin()->getTitle();
			$tns = $title->getNamespace();
			if ( $tns == NS_USER || $tns == NS_USER_TALK ) {
				$id = User::idFromName( $title->getText() );
				if( $id != 0 ) {
					$s .= $sep . $this->userContribsLink();
					if( $this->getSkin()->showEmailUser( $id ) ) {
						$s .= $sep . $this->emailUserLink();
					}
				}
			}
			$s .= $sep;
		}

                $s .= '</div>';
// added for article end


$s .= '<div style="width: 150px;margin:10px;float:left;" >';
$s .= $this->menuHead( 'qbmyoptions' );

// added for login start
                
		if ( $this->data['loggedin'] ) {
			$tl = Linker::link(
				$user->getTalkPage(),
				wfMsg( 'mytalk' ),
				array(),
				array(),
				array( 'known', 'noclasses' )
			);
			if ( $user->getNewtalk() ) {
				$tl .= ' *';
			}

			$s .= Linker::link(
					$user->getUserPage(),
					wfMsg( 'mypage' ),
					array(),
					array(),
					array( 'known', 'noclasses' )
				) . $sep . $tl . $sep . Linker::specialLink( 'Watchlist' )
					. $sep .
				Linker::link(
					SpecialPage::getSafeTitleFor( 'Contributions', $user->getName() ),
					wfMsg( 'mycontris' ),
					array(),
					array(),
					array( 'known', 'noclasses' )
				) . $sep . Linker::specialLink( 'Preferences' )
				. $sep . Linker::specialLink( 'Userlogout' );
		} else {
			$s .= Linker::specialLink( 'Userlogin' );
		}
                $s .= '</div>';
// added for login end

//special pages start
                $s .= '<div style="width: 150px;margin:10px;float:left;" >';

		$s .= $this->menuHead( 'qbspecialpages' )
			. Linker::specialLink( 'Newpages' )
			. $sep . Linker::specialLink( 'Listfiles' )
			. $sep . Linker::specialLink( 'Statistics' );
		if( UploadBase::isEnabled() && UploadBase::isAllowed( $user ) === true ) {
			$s .= $sep . $this->getUploadLink();
		}

		global $wgSiteSupportPage;

		if( $wgSiteSupportPage ) {
			$s .= $sep . '<a href="' . htmlspecialchars( $wgSiteSupportPage ) . '" class="internal">'
					. wfMsg( 'sitesupport' ) . '</a>';
		}
                

		$s .= $sep . Linker::link(
			SpecialPage::getTitleFor( 'Specialpages' ),
			wfMsg( 'moredotdotdot' ),
			array(),
			array(),
			array( 'known', 'noclasses' )
		); 
                $s .= '</div>';               
//special pages end


                //$s = '</td></table >';
                
		$s .= $sep . "\n</div>\n";
		return $s;
	}





  

	/**
	 * @param $key string
	 * @return string
	 */
	function menuHead( $key ) {
		$s = "\n<h6>" . wfMsg( $key ) . "</h6>";
		return $s;
	}


	/**
	 * @param $label string
	 * @return string
	 */
	function searchForm( $label = '' ) {
		global $wgUseTwoButtonsSearchForm;

		$search = $this->getSkin()->getRequest()->getText( 'search' );
		$action = $this->data['searchaction'];
		$s = "<form id=\"searchform{$this->searchboxes}\" method=\"get\" class=\"inline\" action=\"$action\">";
		if( $label != '' ) {
			$s .= "{$label}: ";
		}

		$s .= "<input type='text' id=\"searchInput{$this->searchboxes}\" class=\"mw-searchInput\" name=\"search\" size=\"14\" value=\""
			. htmlspecialchars( substr( $search, 0, 256 ) ) . "\" /><br />"
			. "<input type='submit' id=\"searchGoButton{$this->searchboxes}\" class=\"searchButton\" name=\"go\" value=\"" . htmlspecialchars( wfMsg( 'searcharticle' ) ) . "\" />";

		if( $wgUseTwoButtonsSearchForm ) {
			$s .= "<input type='submit' id=\"mw-searchButton{$this->searchboxes}\" class=\"searchButton\" name=\"fulltext\" value=\"" . htmlspecialchars( wfMsg( 'search' ) ) . "\" />\n";
		} else {
			$s .= '<div><a href="' . $action . '" rel="search">' . wfMsg( 'powersearch-legend' ) . "</a></div>\n";
		}

		$s .= '</form>';

		// Ensure unique id's for search boxes made after the first
		$this->searchboxes = $this->searchboxes == '' ? 2 : $this->searchboxes + 1;

		return $s;
	}
}
