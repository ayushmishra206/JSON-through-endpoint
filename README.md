1. Create a module in D8 website which provides node JSON data through an endpoint.
2. Alter the basic website settings form (/admin/config/system/site-information) and add an API key field, save API key value provided by user in configuration.
3. In case the value of API is not stored, the API key field should show: ""No API Key Saved"
4. Once API is saved in system, create a route with URL (/data/{api-key}/{content-type}/{node-ID}
5. If open this route system should check following information:
   a. {api-key} provided in the URL should match API Key saved in the system or else give access denied message.
   b. {content-type} will have content type machine name in URL. It should be available in the website or else give access denied error.
   c. {node-ID} provided in the URL should be integer, node should exist with that ID and should also be of content type provided in the URL or else access denied.
   d. If all conditions are fulfilled the system should display node data in JSON format.
6. Follow proper coding standards as per Drupal. 7. Create a public repository on GitHub and push all code 8.x-1.x branch."
