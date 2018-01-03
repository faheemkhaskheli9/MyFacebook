<div id="searchdiv">
<div id="searchArea">
<div id="searchbar" contenteditable="true" placeholder="Search" onkeyup="quick_search()" onblur="empty_quick_search()"><?php 
if (isset($_GET['search'])) 
	{
	echo $_GET['search'];
	} 
?>
</div>
<input type="hidden" value="people" id="search_type"/>
<div id="searchButton" onclick="header_searching()"><img src="../images/icons/search-2-512.gif" height="25"></div>
</div>
<div id="quick_search_results"></div>
</div>