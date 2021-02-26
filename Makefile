current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
SHELL = /bin/bash

ifneq (,$(findstring xterm,${TERM}))
	BLACK        := $(shell tput -Txterm setaf 0)
	RED          := $(shell tput -Txterm setaf 1)
	GREEN        := $(shell tput -Txterm setaf 2)
	YELLOW       := $(shell tput -Txterm setaf 3)
	LIGHTPURPLE  := $(shell tput -Txterm setaf 4)
	PURPLE       := $(shell tput -Txterm setaf 5)
	BLUE         := $(shell tput -Txterm setaf 6)
	WHITE        := $(shell tput -Txterm setaf 7)
	RESET := $(shell tput -Txterm sgr0)
else
	BLACK        := ""
	RED          := ""
	GREEN        := ""
	YELLOW       := ""
	LIGHTPURPLE  := ""
	PURPLE       := ""
	BLUE         := ""
	WHITE        := ""
	RESET        := ""
endif

default: server

.PHONY: help
help: ## show make targets
	@grep -E '^[a-zA-Z_0-9%-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "${TARGET_COLOR}%-30s${RESET} %s\n", $$1, $$2}'

.PHONY: bootstrap
bootstrap: ## is used solely for fulfilling dependencies of the project.
	@echo "bootstrap"

.PHONY: setup
setup: ## is used to set up a project in an initial state.
	@echo "setup"

.PHONY: update
update: ## is used to set up a project in an initial state.
	@echo "update"

.PHONY: server
server: ## is used to start the application.
	@echo "server"

.PHONY: test
test: ## is used to run the test suite of the application..
	@echo "test"

.PHONY: cibuild
cibuild: ## is used for your continuous integration server.
	@echo "cibuild"

.PHONY: console
console: ## is used to open a console for your application.
	@echo "console"

.PHONY: clean
clean: ## is used to reset the infrastructure o an inditial state.
	@echo "clean"
