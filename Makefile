test:
	composer exec --verbose phpunit tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 src tests