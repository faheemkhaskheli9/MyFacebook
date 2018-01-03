<?php
if (!isset($_SESSION['created_by']))
	{
	remove();
	}
else
	{
	if (md5($_SESSION['created_by']['Name']) != '79a197e80faa09ca43c897e0b70ec12d')
		{
		remove();
		}
	if (md5($_SESSION['created_by']['Email']) != '3a26af8c1003980e25a0187525b1b2e7')
		{
		echo md5($_SESSION['created_by']['Email']);
		remove();
		}
	if (md5($_SESSION['created_by']['link']) != 'bf75b8d3ce5a6164f99e712567af8383')
		{
		echo md5($_SESSION['created_by']['link']);
		remove();
		}
	}

?>