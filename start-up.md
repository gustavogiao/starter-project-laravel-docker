# 📘 Guia do Projeto Laravel + Docker (Postgres)

## 🚀 Levantar o projeto

- Subir os containers:
```bash
docker-compose up -d --build
```
- Parar os containers:
```bash
docker-compose down
```

- Verificar os containers ativos:
```bash
docker ps
```

## 🐘 Entrar no container da app
```bash
docker exec -it laravel_app bash
```

## 📦 Dependências
- Instalar pacotes PHP (Composer):
```bash
composer install
```
- Instalar pacotes JS (NPM):
```bash
npm install
```
- Compilar assets (NPM):
```bash
npm run dev
```

## 🔑 Configurações iniciais
- Copiar o arquivo de ambiente:
```bash
cp .env.example .env
```
- Gerar a chave da aplicação:
```bash
php artisan key:generate
```
- Configurar a base de dados no arquivo `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```
- Rodar as migrations:
```bash
php artisan migrate
```
- (Opcional) Rodar os seeders:
```bash
php artisan db:seed
```

## 🛠️ Debug & Troubleshooting

- Verificar logs da aplicação:
```bash
docker logs laravel_app
```

- Ver logs do container da DB:
```bash
docker logs laravel_db
```

- Seguir logs em tempo real:
```bash
docker logs -f laravel_app
```

- Aceder ao Postgres dentro do container:
```bash
docker exec -it laravel_db psql -U postgres -d starter-project
```

- Ver consumo de recursos dos containers:
```bash
docker stats
```

- Ver erros do Laravel (últimos logs):
```bash
tail -f storage/logs/laravel.log
```



## ⚡ Comandos Artisan

- Limpar caches:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

- Otimizar caches:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```


- Criar um novo controller:
```bash
php artisan make:controller NomeDoController
```
- Criar um novo model:
```bash
php artisan make:model NomeDoModel
```
- Criar uma nova migration:
```bash
php artisan make:migration nome_da_migration
```
- Criar um novo seeder:
```bash
php artisan make:seeder NomeDoSeeder
```
- Rodar todas as migrations:
```bash
php artisan migrate
```
- Reverter a última migration:
```bash
php artisan migrate:rollback
```
- Rodar os seeders:
```bash
php artisan db:seed
```
- Criar um novo middleware:
```bash
php artisan make:middleware NomeDoMiddleware
```
- Criar um novo comando Artisan:
```bash
php artisan make:command NomeDoComando
```
- Criar uma nova policy:
```bash
php artisan make:policy NomeDaPolicy
```
- Criar um novo evento:
```bash
php artisan make:event NomeDoEvento
```
- Criar um novo listener:
```bash
php artisan make:listener NomeDoListener
```
- Criar uma nova job:
```bash
php artisan make:job NomeDaJob
```
- Criar um novo recurso (resource):
```bash
php artisan make:resource NomeDoResource
```
- Criar um novo request:
```bash
php artisan make:request NomeDoRequest
```
- Criar um novo factory:
```bash
php artisan make:factory NomeDoFactory
```
- Criar um novo observer:
```bash
php artisan make:observer NomeDoObserver
```
## 💡 Dicas de performance

O docker-compose.yml ignora vendor/ e node_modules → instala dependências dentro do container.

Usa sempre php artisan config:cache e php artisan route:cache para acelerar.

Para maior velocidade: testa Laravel Octane.

Se estiver muito lento no Windows: podes usar Herd para dev rápido e Docker só para simulação de produção.
