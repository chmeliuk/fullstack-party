# How to have fun on symfony-party?
0. go to the github developer settings and create new application (see: https://github.com/settings/applications/new).
 remember `client_id` as well as `client_secret`. 
 write down `http://192.168.33.113:8000` in `Homepage Url` and `Authorization callback URL`
1. clone project and checkout `symfony-party` branch 
2. run `vagrant up --provision` and wait till it finish with all preparations and provisions
3. run `vagrant ssh` and navigate to the `/var/www/symfony-party`
4. install composer. see: https://getcomposer.org/download/
5. run `composer install` in project directory and fill required data (client_id, client_secret)
 if you missed the step with parameters, edit file `app/config/parameters.yml`
6. run `sudo -u www-data php bin/console server:start 0.0.0.0:8000`
7. open your browser and type `http://192.168.33.133:8000`.
8. have fun :)


# Great task for Great Fullstack Developer

If you found this task it means we are looking for you!

> Note: To clone this repository you will need [GIT-LFS](https://git-lfs.github.com/)

## Few simple steps

1. Fork this repo
2. Do your best
3. Prepare pull request and let us know that you are done

## Few simple requirements

- Design should be recreated as closely as possible.
- Design must be responsive. Because we live in our smartphones and we will check with them for sure.
- Use GitHub V3 REST API to receive data. [Docs here](https://developer.github.com/v3/)
- Use popular PHP framework (SlimPHP, Lumen, Symfony, Laravel, Zend or any other)
- Use AngularJS or ReactJS.
- Use CSS preprocessor (SCSS preferred).
- Browser support must be great. All modern browsers plus IE9 and above.
- Use a Javascript task-runner. Gulp, Webpack or Grunt - it doesn't matter.
- Do not commit the build, because we are building things on deployment.

## Few tips

- Structure! WE LOVE STRUCTURE!
- Maybe You have an idea how it should interact with users? Do it! Its on you!
- Have fun!
