# Improved-Cart-M2
Improved Cart M2
 
 ## Installation
Go to the **app/code/** folder of your **M2 project** and clone this repo.
 
 `git clone git@github.com:pablobae/Improved-Cart-M2.git .`
 
 
 Install the module executing the following instructions : 
  
 ```
php bin/magento module:status
php bin/magento module:enable Pablobaenas_ImprovedCart
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
php bin/magento cache:clean
php bin/magento cache:flush
```
 
 ## Login2Cart Redirection Feature
Redirects customer to his cart if the cart is not empty after signing in.
 
To enable/disable this feature, login in the Admin, and click menu **Stores** > **Configuration** > **Improved Cart** > **Configuration**.
  
By default is *enabled*
  
 
 ## ACL Role Resources
 Enable or disable access to the **Improved Cart** configuration depending on the type of admin user. Role resources created:
 **Store** > **Settings** > **All Stores** > **Configuration** > **Improved Cart**.
 
 
 ## Checkout Cart Banners 
Two new banners added in the checkout/cart page.  The top banner can be edited from the administration area. Login in the Admin, and click **Content** > **Elements | Blocks**.
Look for **Improved Cart Banner** block, and edit its content as you wish. Save the changes and refresh de cache.

The bottom banner uses a template file that gets data from a Block Class. This class can be used to get Magento models data and provide it to the template.




 
  
