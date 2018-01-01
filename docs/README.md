# Option Tree (Extended)
Option Tree is a popular WordPress Options Framework. This is an extended and improved version of the original Framework with changes in core code and some new useful fields added. The original Option Tree Framework can still be found at it's [official GIT Repository](https://github.com/valendesigns/option-tree).  

**Why not to fork the existing Repository?**

Yes, that was the first option I checked. But I noticed I will soon need to touch the base-code of the Core of Framework in order to achieve the desired performance, flexibility and ease. I felt forking the original will make dealing with the versions and updates (if at all any released by the original framework programmers) difficult for me and so I decided to have my own repository for Option Framework. The credit for original code still goes to the makers and I owe a big thanks to them for all their hard work.

## How to use?

It's simple. 

1. Download the master branch as ZIP file. Extract the content somewhere in a new empty folder. 
1. Now, create a directory under the root of your theme/plugin 
1. Copy the content of "dist" folder to your newly created directory. 
1. Let's say you've created a directory "admin/framework" under the root; in this scenario, copy following lines of code to your "functions.php" file.

```php
/**********************************************
    THEME OPTIONS
***********************************************/
add_filter('ot_show_pages','__return_false');
add_filter('ot_show_new_layout','__return_false');
add_filter('ot_theme_mode','__return_true');
add_filter('ot_header_version_text', 'ot_theme_options_header');
function ot_theme_options_header() {
    return 'Theme Options';
}
include_once('admin/framework/ot-loader.php');
```

That's it. Now, create a separate file, say "theme-options.php" and include this file with ````required_once```` AFTER the above framework initialization code. Refer Wiki pages for creating your own theme options and metaboxes.

***

## What's New

### Update 06

**NEW CONTROL TYPE -- clockpicker**

Clockpicker is an innovative Time Picker control that allows user to select Hour and Minutes by simply dragging the clock-hand. Control can be customized through ```settings```. Check Wiki pages for more information.

### Update 05

**NEW CONTROL TYPE -- email**

Advanced Email Input field which guesses the Domain part of email as you type. Some popular Email Domains are already defined; you can define your own domain names as comma-delimited list. Check Wiki Pages for more information.

### Update 04

**NEW CONTROL TYPE -- touchspinner** 

Spinner Control added with Mobile Touch support. Horizontal as well as Vertical layout of spinner control is possible. Lot of other settings available to customize the control's functionality. Check WiKi Pages for more information.

### Update 03

**NEW CONTROL TYPE -- bootstrap_toggle**

Better alternative for On/Off control type. Completely backword compatible with On/Off, with lot of settings available to customize it. Check WiKi Pages for more information.

**NEW CONTROL TYPE -- iconpicker** 

Offer a visual control to the User to pick the icon. Several different Icon Fonts supported. Check WiKi Pages for more information.

### Update 02

**NEW CONTROL TYPE -- editor** 

Integrated "SummerNote" WYSIWYG HTML editor as an alternative for TinyMCE. Works perfectly well in Metabox as well. Check the Wiki Pages for more information

**NEW CONTROL TYPE -- masked_textbox** 

Integrated Masked Input Textbox. Now you can offer masked textbox. Check the WiKi Pages for more information

**Columns to arrange controls in one line**

Support for Columns added. Now you can arrange your controls in columns on single like (like Bootstrap Row/Col). Defne Class as col-1 through col-12 in such a way that the addition of "n" in "col-n" in one line equals to 12. Check Wiki Pages for more information.

### Update 01

- jQuery updated to the latest version
- Bootstrap updated to the latest version
- Original Styles changed a little to make the options look more compact
