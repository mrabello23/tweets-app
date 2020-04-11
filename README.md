## Tweets App

- Find tweets by given Hashtag
- List all tweets from hashtags: hashtags: #openbanking, #apifirst, #devops, #cloudfirst, #microservices, #apigateway, #oauth, #swagger, #raml, #openapis
- List user with most followers from hashtags: hashtags: #openbanking, #apifirst, #devops, #cloudfirst, #microservices, #apigateway, #oauth, #swagger, #raml, #openapis
- List total tweets by hour from hashtags: hashtags: #openbanking, #apifirst, #devops, #cloudfirst, #microservices, #apigateway, #oauth, #swagger, #raml, #openapis
- List total tweets by hashtag and country from hashtags: hashtags: #openbanking, #apifirst, #devops, #cloudfirst, #microservices, #apigateway, #oauth, #swagger, #raml, #openapis


## Requirements

- Docker and Docker Compose installed


## Run project

- Run "docker-compose build"
- Run "docker-compose up"


## Run Unit and Feature Tests

- docker exec -it webapp /var/www/html/vendor/bin/phpunit /var/www/html/tests


## Application and API

App Url:
- http://localhost:8081/

API Base Url:
- http://localhost:8081/api/v1/


## API Docs

Swagger: 
- http://localhost:8082/


## Documentation and Prints

- https://github.com/mrabello23/tweets-app/blob/master/docs


## System and Container Dashboards Metrics

After start application, the metrics will be available at:
- https://p.datadoghq.com/sb/pymarljnjizo00ix-48311cfc6071007a01ac51dfe1d0b50d
- https://p.datadoghq.com/sb/pymarljnjizo00ix-d3ab1d40a62578fba270d81147e7719a


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
