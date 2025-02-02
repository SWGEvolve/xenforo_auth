# xenforo_auth

This guide does not include install methods for Xenforo itself. These can be found on the official Xenforo website.

https://xenforo.com/docs/xf2/install/

In auth.php replace URL/api/auth/ with the url that directs to your Xenforo API and includes the auth function, for example: https://www.website.com/api/auth/

The API for a specific XenForo installation is accessible at <XenForo base URL>/api/. All endpoints are prefixed by this URL. For example, if XenForo is installed at https://example.com/community/, then the API URLs will start with https://example.com/community/api/

API keys are created via the admin control panel by going to Setup > API keys.

<p><img src="/screenshots/img1.jpg"></p>

<p><img src="/screenshots/img2.jpg"></p>

For our purposes this key should be a Super user key and it only needs the "auth" and "user:read" scopes.

<p><img src="/screenshots/img3.jpg"></p>

In auth.php replace KEY in the "XF-Api-Key: KEY" section with your API Key.

By default this looks for user_state "valid" which is the state of a Xenforo user after they have signed up and verified their email address.

Now you need to upload the auth.php to your website. This does not have to be in the root of the website or in the same location as the Xenforo install. The most important thing is that it correctly points to the API url and that your SWG servercommon.cfg file will point to the location of this auth.php file.

<p><img src="/screenshots/img4.jpg"></p>


