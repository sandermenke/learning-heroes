##Learning heroes code challenge

### Setting up the project
```
Clone the project
$ composer install
$ npm install
$ npm run dev
$ php artisan migrate
```

After setting up the environment keys for Mailjet and Sendgrid you can send an email the following ways:

#### CLI
```
php artisan email:send --to= --subject= --message=
```

#### Frontend
Open the project and send an email via the form found on the homepage.

## Choices
I made sure to use all the requested techniques. 
- For sending the emails I used jobs so these can be queued and exceuted asynchronously. 
- I used the repository pattern for the models as this was spoken about in the interview.
- To make sure multiple multiple mail formats work I always parse the content and send it as HTML to the backend (If the HTML option wasn't chosen). 
- I used constants in my model to prevent having to change strings in multiple places.

If there are any other questions about certain choices, I would love to answer them!
