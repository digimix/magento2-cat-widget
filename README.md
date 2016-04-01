# magento2-cat-widget
List categories by url_key on any CMS page.

#Features
<ul>
<li>Add category list anywhere</li>
<li>Category image into list</li>
<li>Can manage image size</li>
<li>Can assign custom categories to list by ID</li>
</ul>

<h2>Composer Installation Instructions</h2>
Add GIT Repository to composer
<pre>
composer config repositories.digimix-magento2-cat-widget vcs https://github.com/digimix/magento2-cat-widget/
</pre>

After that, need to install this module as follows:
<pre>
  composer require magento/magento-composer-installer
  composer require digimix/catwidget
</pre>

<br/>
<h2> Manual Installation Instructions</h2>
go to Magento2Project root dir 
create following Directory Structure :<br/>
<strong>/Magento2Project/app/code/Digimix/CatWidget</strong>
you can also create by following command:
<pre>
cd /Magento2Project
mkdir app/code/Digimix
mkdir app/code/Digimix/CatWidget
</pre>

<h3> Enable Digimix/CatWidget Module</h3>
to Enable this module you need to follow these steps:

<ul>
<li>
<strong>Enable the Module</strong>
<pre>bin/magento module:enable Digimix_CatWidget</pre></li>
<li>
<strong>Run Upgrade Setup</strong>
<pre>bin/magento setup:upgrade</pre></li>
<li>
<strong>Re-Compile (in-case you have compilation enabled)</strong>
	<pre>bin/magento setup:di:compile</pre>
</li>
</ul>