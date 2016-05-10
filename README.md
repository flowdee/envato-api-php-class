#Envato API PHP Class
This PHP Class was created in order to communicate with the new Envato API.
For more information please take a look into the official [Envato API documentation](https://build.envato.com/api/ "Envato API documentation").

##Installation
In order to use this class respectively the API you need a **personal token** which can be created [here](https://build.envato.com/create-token/ "Create a token").

``` php
// Including class to your project
require('Envato.php');

// Setup Envato with your credentials
$envato = new Envato(ENVATO_TOKEN);
```

Please replaced <code>ENVATO_TOKEN</code> with your personal credentials.

##Advanced usage
###Response types
By default the API returns the response as object, but with this class you can set it to array too:
``` php
// Update the response type
$envato->set_response_type('array');
```

##Examples
###Receive open tickets
``` php
// Receive all purchases of the buyer
$purchases = $envato->call('/buyer/list-purchases');

// Receive purchase data by delivering the purchase code
$purchase_data = $envato->call('/buyer/purchase?code=XXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXX');
```

These are just some examples. The complete list can be found inside the [Envato API documentation](https://build.envato.com/api/ "Envato API documentation").

If you don't want to miss an update or say hello, follow me on Twitter: [@flowdee](https://twitter.com/flowdee "@flowdee") :wink:
##Credits
* [Envato API](https://build.envato.com/ "Envato API")