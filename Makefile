PWD=$(shell pwd)

default: install-composer install-docker-compose docker-compose-build

kill: docker-compose-down

install-composer:
	docker run --rm -u 1000:1000 -v $(PWD)/composer:/app zburgermeiszter/docker-composer install

docker-compose-build:
	docker-compose build

docker-compose-down:
	docker-compose down

install-docker-compose:
	mkdir -p $(HOME)/bin
	curl -L https://github.com/docker/compose/releases/download/1.6.2/run.sh > $(HOME)/bin/docker-compose
	chmod +x $(HOME)/bin/docker-compose