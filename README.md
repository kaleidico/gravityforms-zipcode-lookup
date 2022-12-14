# Gravity Forms - Zipcode Look Up

This is a code snippet that we wrote that takes the zipcode a user types in and it uses the Google GEOCoding API to grab the city and state for the zip code provided.

This is a Loom video that walks you through how to create a GEOCoding API on Google: [https://www.loom.com/share/9ff5ff76c8a948699e1b0b8be8cf64a1](https://www.loom.com/share/9ff5ff76c8a948699e1b0b8be8cf64a1)

```mermaid
graph LR
A[User input on Gravity Forms] -- API Call --> B((Google GEOCoding)) 
B -- Return Response --> C{WordPress for Parsing}
C --> D[Value to Gravity Forms]
```

## Configuration Before Coding
In Gravity Forms, there are a few necessary steps before applying any of the code in the repository.

 1. Locate the ID of the form and make note of that somewhere. This ID will replace the placeholder of [form-id] in the code.
 2. Create 3 hidden fields. city, longState and shortState and make note of each of those IDs as well. These IDs will replace [city-id], [shortState-id] and [longState-id] in the code.
 3. You will need an API Key provided by the client. In the documentation above, there is a Loom video that walks the user through on how to obtain an API key. This API key will be stored in the Theme Settings --> Private Keys in WordPress. If this section is missing, it will need to be imported from the Velocity Theme.
 4. If the Gravity Form doesn't already have a zip code field for the user to type in their zip code, you'll need to add one as well and make note of that ID. This ID will replace the placeholder of [zipcode-id] in the code.
 5. Anywhere in the code that you see [form-name], you'll replace with your form name.


## Coding
You're now ready to move onto the code. The snippet can be found in functions.php in this repository. Simply add this snippet to your functions.php in WordPress (Child theme takes priority over parent theme).
