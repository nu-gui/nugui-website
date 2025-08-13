# NU GUI Website - Development & Deployment Makefile
# Usage: make [command]

.PHONY: help install dev build test deploy clean docker-up docker-down docker-build docker-logs docker-shell

# Detect if we should use Docker
DOCKER_COMPOSE := $(shell if [ -f "dev-tools/docker/docker-compose.yml" ]; then echo "docker-compose -f dev-tools/docker/docker-compose.yml"; fi)

# Default target
help:
	@echo "NU GUI Website - Available Commands"
	@echo "===================================="
	@echo ""
	@echo "🐳 Docker Commands:"
	@echo "make docker-up      - Start Docker containers"
	@echo "make docker-down    - Stop Docker containers"
	@echo "make docker-build   - Rebuild Docker containers"
	@echo "make docker-logs    - View Docker logs"
	@echo "make docker-shell   - Enter web container shell"
	@echo ""
	@echo "💻 Local Commands:"
	@echo "make install        - Install dependencies"
	@echo "make dev            - Start development server"
	@echo "make build          - Build for production"
	@echo "make test           - Run tests"
	@echo "make deploy         - Deploy to production"
	@echo "make clean          - Clean caches and temp files"
	@echo ""

# Docker commands
docker-up:
	@echo "🐳 Starting Docker containers..."
	cd dev-tools/docker && docker-compose up -d
	@echo "✅ Containers started"
	@echo "🌐 Website: http://localhost:8080"
	@echo "🗄️  phpMyAdmin: http://localhost:8081"

docker-down:
	@echo "🐳 Stopping Docker containers..."
	cd dev-tools/docker && docker-compose down
	@echo "✅ Containers stopped"

docker-build:
	@echo "🔨 Rebuilding Docker containers..."
	cd dev-tools/docker && docker-compose build --no-cache
	cd dev-tools/docker && docker-compose up -d
	@echo "✅ Containers rebuilt and started"

docker-logs:
	@echo "📋 Docker logs (Ctrl+C to exit)..."
	cd dev-tools/docker && docker-compose logs -f

docker-shell:
	@echo "🐚 Entering web container..."
	docker exec -it nugui-web bash

# Install all dependencies (Docker-aware)
install:
	@echo "📦 Installing dependencies..."
	@if [ -n "$(DOCKER_COMPOSE)" ]; then \
		docker exec nugui-web composer install; \
		if [ -f "package.json" ]; then docker exec nugui-web npm install; fi; \
	else \
		composer install; \
		if [ -f "package.json" ]; then npm install; fi; \
	fi
	@echo "✅ Dependencies installed"

# Start development server (Docker-aware)
dev:
	@echo "🚀 Starting development server..."
	@if [ -n "$(DOCKER_COMPOSE)" ]; then \
		make docker-up; \
	else \
		php spark serve --host 0.0.0.0 --port 8080; \
	fi

# Build for production (Docker-aware)
build:
	@echo "🔨 Building for production..."
	@if [ -n "$(DOCKER_COMPOSE)" ] && [ -f "dev-tools/docker/docker-compose.yml" ]; then \
		docker exec nugui-web composer install --no-dev --optimize-autoloader; \
		if [ -f "package.json" ]; then docker exec nugui-web npm run build 2>/dev/null || true; fi; \
	else \
		composer install --no-dev --optimize-autoloader; \
		if [ -f "package.json" ]; then npm run build 2>/dev/null || true; fi; \
	fi
	@echo "✅ Build complete"

# Run tests (Docker-aware)
test:
	@echo "🧪 Running tests..."
	@if [ -n "$(DOCKER_COMPOSE)" ] && [ -f "dev-tools/docker/docker-compose.yml" ]; then \
		docker exec nugui-web bash -c "if [ -f vendor/bin/phpunit ]; then ./vendor/bin/phpunit --testdox; else echo 'No tests configured'; fi"; \
	else \
		if [ -f "vendor/bin/phpunit" ]; then \
			./vendor/bin/phpunit --testdox; \
		else \
			echo "No tests configured"; \
		fi; \
	fi

# Deploy to production
deploy:
	@echo "🚀 Deploying to production..."
	@bash scripts/local-deploy.sh

# Clean temporary files (Docker-aware)
clean:
	@echo "🧹 Cleaning temporary files..."
	@if [ -n "$(DOCKER_COMPOSE)" ] && [ -f "dev-tools/docker/docker-compose.yml" ]; then \
		docker exec nugui-web bash -c "rm -rf writable/cache/* writable/logs/* writable/debugbar/* writable/session/*"; \
	else \
		rm -rf writable/cache/* writable/logs/* writable/debugbar/* writable/session/*; \
	fi
	@echo "✅ Cleaned"

# Quick commit and deploy
quick-deploy:
	@echo "⚡ Quick deploy..."
	git add -A
	git commit -m "feat: Update website content"
	git push origin latest-production-build
	@echo ""
	@echo "📌 Now go to cPanel and deploy!"

# Docker-specific: Run migrations
docker-migrate:
	@echo "🗄️  Running migrations in Docker..."
	docker exec nugui-web php spark migrate
	@echo "✅ Migrations complete"

# Docker-specific: Seed database
docker-seed:
	@echo "🌱 Seeding database in Docker..."
	docker exec nugui-web php spark db:seed
	@echo "✅ Database seeded"