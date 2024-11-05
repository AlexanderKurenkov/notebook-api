Запуск в Docker-окружении:
* $ git clone https://github.com/AlexanderKurenkov/notebook-api.git
* $ cd ./notebook-api
* создать файл .env на основе .env.example и указать нужные учетные данные пользователя: $ mv .env.example .env
* $ docker-compose up -d
* базовый URL для доступа к сервису: http://localhost:8000/

Было выполнено ручное тестирование на основе файла с описанием API (resources/openapi/notebook-api.yaml), используя Postman в качестве API-клиента.р