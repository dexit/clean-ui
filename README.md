![Clean UI](https://user-images.githubusercontent.com/499192/143415951-b01e9498-5f18-44dd-9d4b-51fb2d479a22.png)

# Clean UI

> Take control over the administration dashboard.

This WordPress plugin makes the administration dashboard prettier and your client happier. It provides better UX experience for your clients in WordPress.

## Installation

Download the repository, put the plugin into your project's plugin directory and edit the `clean-ui.php` file to your liking. This plugin can't be published to Packagist and installed using Composer since you need to edit the plugin.

If you're using WordPlate you'll also need to unignore the plugin in the `public/.gitignore` file:

```diff
+!mu-plugins/clean-ui
```

## Features

All features are activated when the plugin is activated.

- Add custom login form logo
- Add custom dashboard favicon 
- Remove menu page items
- Remove toolbar menu items
- Remove dashboard widgets
