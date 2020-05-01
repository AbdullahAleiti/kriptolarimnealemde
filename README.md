# kriptolar ne Alemde

A beautiful web application for tracking your cryptocurrency holdings.
It is a light `php` application that you can setup easly on your local computer and deploy it on your server.
If you have invested some crypto for your friends or family, it is a great way to keep them informed 👨‍💻.

### Setup
You can setup your portfolio in two ways.
The first by manually editing `data.json` . Add a crypto - balance pair under portfolio.
and make the password an empty string to gain access or use `create-portfolio.php` script which will walk you though the setup. But it requires you to have `php` installed.

```
php create_portfolio.php
```

After setting it up you are ready to upload it to your server or use it locally.
For you financial privacy, You can make sure that only `/public` folder is accessible from your server provider. 

## License
- **[MIT license](http://opensource.org/licenses/mit-license.php)**