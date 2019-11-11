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

## System Architecture Docs:

- https://github.com/mrabello23/tweets-app/blob/master/docs/system_architecture.pdf


## System and Container Dashboards Metrics

After start application, the metrics will be available at:
- https://p.datadoghq.com/sb/pymarljnjizo00ix-48311cfc6071007a01ac51dfe1d0b50d
- https://p.datadoghq.com/sb/pymarljnjizo00ix-d3ab1d40a62578fba270d81147e7719a


## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
