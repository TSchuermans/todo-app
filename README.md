# TODO app setup (OSX)
## 1. setup hosts file
```
echo "127.0.0.1 todo.app" | sudo tee -a /etc/hosts
```
## 2. setup docker
```
# als docker nog niet installed is
brew update
brew tap caskroom/cask
brew cask install docker
brew cleanup 

# als docker installed is
docker-compose up -d
```
## 3. setup self-signed certificate
```
sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain docker/nginx/ssl/todo.app.crt
```
## 4. relax
```
the php container waits on mariadb to be available.
use docker-compose logs -f to check on progress
```
