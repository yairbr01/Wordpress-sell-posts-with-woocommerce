# Wordpress sell posts with woocommerce
With this repository you can create a payment system for posts on your site

Plugin required:
1. woocommerce.
2. JetEngine (The functions here are written in accordance with this plugin, but can be adapted for use with forms in any other plugin).


how to use?
1. Create a post publish form (you can do this using the "forms" module in the JetEngine plugin). The form will publish the posts in "private" mode.
2. Add a field in the form called "ad_type" of the "radio" type where the user can select the appropriate product, the values should be the ID of the products.
3. In actions after submitting the form, add an "Call a Hook" action and enter the value "publish_payment".
4. Add another action after sending and it is a reference to the payment page.
5. Add multiple products, each product indicates a package type, if you have only one then add a single product.
6. Add a custom field in posts, the field type is "select" named "ad_type". The values of the selections in this field will be the ID of the products you have created.


Explanation of the actions:
1. The user publish the post in "Private" mode.
2. The user is then taken to the payment page where he pays for the post.
3. After payment the corresponding field for the post showing the type of package is updated and the post is moved to "publish" mode.
