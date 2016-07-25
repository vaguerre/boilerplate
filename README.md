# Fifty Boilerplate

Both the Static HTML site and custom WP theme are included in this repository. See details below for getting local environments setup.

* Find all and replace `fiftyboilerplate`
* Find all and replace `FIFTYBOILERPLATE`
* Find all and replace `Fifty Boilerplate`
* Find all and replace `Fiftyboilerplate`


Local Setup Walkthrough [Google Doc](https://docs.google.com/a/fiftyandfifty.org/document/d/1mlA4cf6NTcEKCAWWqABudNqxpMJkm6dvNXwndBd1S5Q/edit?usp=sharing)

## Setting up local environment
* Create folder `sites/<project>`
* Setup localhosts - Ex: `~/../../etc/apache2/extra/httpd-vhosts.conf` & `~/../../etc/hosts`
	* Static site runs at `http://localhost:4000`
	* WP site runs at path set in `vhosts.conf` and `hosts` files. ex: `site.dev`


#### Getting started: Static site
* `$ cd app`
* `$ sudo gem install sass`
* `$ npm install`
* `$ gulp`

Site runs at `http://localhost:4000/`


#### Getting started: WP theme
* Install WP locally: `$ cd <project>; wp core download`
* Add dev db to Sequel Pro
* Create and update `wp-config.php` file


Compiling styles: WP theme
* `$ cd <theme>`
* `$ sudo gem install sass`
* `$ npm install`
* `$ gulp`


## WP CMB2 setup
https://github.com/WebDevStudios/CMB2
* The following folders must be uploaded to server (using Transmit, Cyber Duck or other to SFTP files):
  * [CMB2](https://github.com/WebDevStudios/CMB2) `mu-plugins/cmb2` 
  * [CMB2 Attached Posts](https://github.com/WebDevStudios/cmb2-attached-posts) `mu-plugins/cmb2-attached-posts`
  * [WDS Simple Page Builder](https://github.com/WebDevStudios/WDS-Simple-Page-Builder/wiki) `mu-plugins/wds-simple-page-builder` 
* The file `/mu-plugins/include-cmb-for-project.php` includes the necessary mu-plugins. The WDS Simple Page builder is commented out in line 14 of this file. To use the Simple Page builder, you must uncomment that line.
* CMB2 fields can be created in the folder `theme/includes/fields/...`. See `fields/cmb2-hero.php` for example and [Field Types here](https://github.com/WebDevStudios/CMB2/wiki/Field-Types). To include the fields, the files must be added in the `functions.php` file in the `init` function