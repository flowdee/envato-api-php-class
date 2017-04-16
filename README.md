#Envato API PHP Class
This PHP Class was created in order to communicate with the new Envato API.
For more information please take a look into the official [Envato API documentation](https://build.envato.com/api/ "Envato API documentation").

##Setup
In order to use this class respectively the API you need a **personal token** which can be created [here](https://build.envato.com/create-token/ "Create a token").

``` php
// Including class to your project
require('Envato.php');

// Setup Envato with your credentials
$envato = new Envato(ENVATO_TOKEN);
```

Please replace <code>ENVATO_TOKEN</code> with your personal credentials.

``` php
// Updating the response type
$envato->set_response_type('array');
```
By default the API returns an object, but with this class you can return an array as well:

##Examples
``` php
// Receive all purchases of the buyer
$purchases = $envato->call('/buyer/list-purchases');

// Receive purchase data by submitting the purchase code
$purchase_data = $envato->call('/buyer/purchase?code=XXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXX');
```

These are just some examples. The complete list can be found inside the [Envato API documentation](https://build.envato.com/api/ "Envato API documentation").

##Info
If you don't want to miss an update or say hello, follow me on Twitter: [@flowdee](https://twitter.com/flowdee "@flowdee") :wink:
##Credits
* [Envato](https://build.envato.com/ "Envato")