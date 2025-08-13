#!/bin/bash

# NU GUI Website - Docker Local Development Test Script
# This script helps you test the Docker container build using localhost .env

echo "==========================================="
echo "NU GUI Website - Docker Local Test"
echo "==========================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if Docker is installed and running
echo "1. Checking Docker installation..."
if ! command -v docker &> /dev/null; then
    echo -e "${RED}❌ Docker is not installed${NC}"
    echo "Please install Docker Desktop from: https://www.docker.com/products/docker-desktop"
    exit 1
fi

if ! docker info &> /dev/null; then
    echo -e "${RED}❌ Docker is not running${NC}"
    echo "Please start Docker Desktop and try again"
    exit 1
fi

echo -e "${GREEN}✅ Docker is installed and running${NC}"
echo ""

# Check if docker-compose is available
echo "2. Checking Docker Compose..."
if command -v docker-compose &> /dev/null; then
    DOCKER_COMPOSE_CMD="docker-compose"
elif docker compose version &> /dev/null; then
    DOCKER_COMPOSE_CMD="docker compose"
else
    echo -e "${RED}❌ Docker Compose is not available${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Docker Compose is available${NC}"
echo ""

# Navigate to docker directory
DOCKER_DIR="dev-tools/docker"
if [ ! -d "$DOCKER_DIR" ]; then
    echo -e "${RED}❌ Docker directory not found at $DOCKER_DIR${NC}"
    exit 1
fi

cd "$DOCKER_DIR"

# Check for .env file
echo "3. Checking environment configuration..."
if [ ! -f ".env" ]; then
    echo -e "${YELLOW}⚠️  .env file not found in $DOCKER_DIR${NC}"
    echo "Creating .env from example..."
    if [ -f "../../.env.docker.example" ]; then
        cp "../../.env.docker.example" ".env"
        echo -e "${GREEN}✅ Created .env from .env.docker.example${NC}"
    else
        echo -e "${RED}❌ No .env.docker.example found${NC}"
        exit 1
    fi
else
    echo -e "${GREEN}✅ .env file exists${NC}"
fi
echo ""

# Display current configuration
echo "4. Current Configuration:"
echo "----------------------------"
if [ -f ".env" ]; then
    echo "Base URL: $(grep 'app.baseURL' .env | cut -d'=' -f2 | tr -d ' ')"
    echo "Database Host: $(grep 'database.default.hostname' .env | cut -d'=' -f2 | tr -d ' ')"
    echo "Database Name: $(grep 'database.default.database' .env | cut -d'=' -f2 | tr -d ' ')"
    echo "Database Port: $(grep 'database.default.port' .env | cut -d'=' -f2 | tr -d ' ')"
    echo "Environment: $(grep 'CI_ENVIRONMENT' .env | cut -d'=' -f2 | tr -d ' ')"
fi
echo ""

# Build options
echo "5. Docker Build Options:"
echo "----------------------------"
echo "a) Build and start containers (fresh build)"
echo "b) Start existing containers"
echo "c) Stop all containers"
echo "d) Rebuild containers (clean build)"
echo "e) View container logs"
echo "f) Enter web container shell"
echo "g) View container status"
echo "h) Clean up (remove containers and volumes)"
echo "q) Quit"
echo ""
read -p "Choose an option: " choice

case $choice in
    a)
        echo -e "${YELLOW}Building and starting containers...${NC}"
        $DOCKER_COMPOSE_CMD up -d --build
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ Containers built and started successfully${NC}"
            echo ""
            echo "Access your site at:"
            echo "  - Website: http://localhost:8080"
            echo "  - PHPMyAdmin: http://localhost:8081"
            echo "  - MySQL: localhost:3307"
        else
            echo -e "${RED}❌ Failed to build/start containers${NC}"
        fi
        ;;
    
    b)
        echo -e "${YELLOW}Starting existing containers...${NC}"
        $DOCKER_COMPOSE_CMD up -d
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ Containers started successfully${NC}"
            echo ""
            echo "Access your site at:"
            echo "  - Website: http://localhost:8080"
            echo "  - PHPMyAdmin: http://localhost:8081"
            echo "  - MySQL: localhost:3307"
        else
            echo -e "${RED}❌ Failed to start containers${NC}"
        fi
        ;;
    
    c)
        echo -e "${YELLOW}Stopping containers...${NC}"
        $DOCKER_COMPOSE_CMD down
        echo -e "${GREEN}✅ Containers stopped${NC}"
        ;;
    
    d)
        echo -e "${YELLOW}Rebuilding containers...${NC}"
        $DOCKER_COMPOSE_CMD down
        $DOCKER_COMPOSE_CMD build --no-cache
        $DOCKER_COMPOSE_CMD up -d
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ Containers rebuilt successfully${NC}"
        else
            echo -e "${RED}❌ Failed to rebuild containers${NC}"
        fi
        ;;
    
    e)
        echo -e "${YELLOW}Viewing container logs...${NC}"
        $DOCKER_COMPOSE_CMD logs -f
        ;;
    
    f)
        echo -e "${YELLOW}Entering web container shell...${NC}"
        docker exec -it nugui-web bash
        ;;
    
    g)
        echo -e "${YELLOW}Container Status:${NC}"
        $DOCKER_COMPOSE_CMD ps
        echo ""
        echo -e "${YELLOW}Docker containers:${NC}"
        docker ps --filter "name=nugui"
        ;;
    
    h)
        echo -e "${RED}⚠️  This will remove all containers and volumes!${NC}"
        read -p "Are you sure? (y/n): " confirm
        if [ "$confirm" == "y" ]; then
            $DOCKER_COMPOSE_CMD down -v
            echo -e "${GREEN}✅ Cleanup complete${NC}"
        else
            echo "Cleanup cancelled"
        fi
        ;;
    
    q)
        echo "Exiting..."
        exit 0
        ;;
    
    *)
        echo -e "${RED}Invalid option${NC}"
        ;;
esac

echo ""
echo "==========================================="
echo "Docker test complete"
echo "==========================================="