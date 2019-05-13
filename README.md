# TODO app setup (OSX)
## 1. setup hosts file
```
echo "127.0.0.1 todo.app" | sudo tee -a /etc/hosts
```
## 2. setup docker
```
# install docker if necessary
brew update
brew tap caskroom/cask
brew cask install docker
brew cleanup 

# when docker is installed
docker-compose up --build --detach
```
## 3. relax
```
the php container waits on mariadb to be available (it might take a while).
use docker-compose logs -f to check on progress
```
## 4. setup self-signed certificate
```
sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain docker/nginx/ssl/todo.app.crt
```
## 5. run grumphp
```
docker exec -it todo_app_php /bin/bash -c "./bin/grumphp run"
```
## 6. run tests
```
docker exec -it todo_app_php /bin/bash -c "./bin/phpunit"
```
## 7. try it out
[https://todo.app:8443](https://todo.app:8443)

