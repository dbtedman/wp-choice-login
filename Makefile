.DEFAULT_GOAL := all

.PHONY: all
all: install lint test

.PHONY: install
install:
	@composer install

.PHONY: lint
lint:
	@composer run lint

.PHONY: format
format:
	@composer run format

.PHONY: test
test:
	@composer run test

.PHONY: help_ide
help_ide:
	@./automation-help-ide.sh

.PHONY: local
local:
	@./automation-local.sh
