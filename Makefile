BUILD_ENV :=Development

# build for development, for build machine please confirm to devOps need install composer to support install dependencies
build: check
	@docker build -f docker/Dockerfile --tag=prakasa1904/wp-environment:$(TAG) .

push: check
	@docker push prakasa1904/wp-environment:$(TAG)

run:
	@cp .env.example .env
	@mkdir -p mysql/volume && chmod -R 0777 mysql/volume
	@ docker-compose down --remove-orphans
	@ docker-compose up

stop:
	@ docker-compose down --remove-orphans

check:
ifeq ($(BUILD_ENV),Development)
		$(eval TAG := $(shell echo "dev"))
else
	$(eval TAG := $(shell echo "latest"))
endif