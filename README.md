# TODO app setup (OSX)
## hosts file
```
echo "127.0.0.1 todo.app" | sudo tee -a /etc/hosts
```
## docker
```
# als docker nog niet installed is
brew update
brew tap caskroom/cask
brew cask install docker
brew cleanup 

# als docker installed is
docker-compose up -d
```
## trust self-signed certificate
```
sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain docker/nginx/ssl/todo.app.crt
```
