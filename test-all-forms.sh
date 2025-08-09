#!/bin/bash

echo "==========================================
NU GUI Website - Comprehensive Form Testing
==========================================
"

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Test Contact Form
echo -e "${YELLOW}1. Testing Contact Form...${NC}"
echo "----------------------------------------"

# Get CSRF token
CSRF=$(curl -s http://localhost:8080/contact | grep -oP 'name="csrf_test_name"\s+value="\K[^"]+' | head -1)
echo "CSRF Token: ${CSRF:0:20}..."

# Submit contact form
CONTACT_DATA="name=John+Doe&\
email=test@example.com&\
subject=Test+Contact+Form&\
message=This+is+a+test+message+to+verify+the+contact+form+is+working+properly.&\
form_start_time=$(($(date +%s) - 10))&\
form_token=test_$(date +%s)"

if [ ! -z "$CSRF" ]; then
    CONTACT_DATA="${CONTACT_DATA}&csrf_test_name=${CSRF}"
fi

CONTACT_RESULT=$(curl -s -L -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -H "User-Agent: Mozilla/5.0" \
  -d "$CONTACT_DATA" \
  http://localhost:8080/submit_contact_form 2>&1)

if echo "$CONTACT_RESULT" | grep -q "Your message has been sent" || echo "$CONTACT_RESULT" | grep -q "success"; then
    echo -e "${GREEN}✅ Contact form: PASSED${NC}"
else
    echo -e "${RED}❌ Contact form: FAILED${NC}"
    echo "Response: ${CONTACT_RESULT:0:200}"
fi

echo ""

# Test Support Form
echo -e "${YELLOW}2. Testing Support Form...${NC}"
echo "----------------------------------------"

# Get CSRF token
CSRF=$(curl -s http://localhost:8080/support | grep -oP 'name="csrf_test_name"\s+value="\K[^"]+' | head -1)
echo "CSRF Token: ${CSRF:0:20}..."

# Submit support form
SUPPORT_DATA="name=Jane+Smith&\
email=support@example.com&\
product=NU+SIP&\
priority=Medium&\
issue=Connection+Problem&\
message=I+am+experiencing+connection+issues+with+the+NU+SIP+service.+Please+help+resolve+this+issue.&\
form_start_time=$(($(date +%s) - 10))&\
form_token=test_$(date +%s)"

if [ ! -z "$CSRF" ]; then
    SUPPORT_DATA="${SUPPORT_DATA}&csrf_test_name=${CSRF}"
fi

SUPPORT_RESULT=$(curl -s -L -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -H "User-Agent: Mozilla/5.0" \
  -d "$SUPPORT_DATA" \
  http://localhost:8080/submit_support_form 2>&1)

if echo "$SUPPORT_RESULT" | grep -q "support request has been sent" || echo "$SUPPORT_RESULT" | grep -q "Ticket"; then
    echo -e "${GREEN}✅ Support form: PASSED${NC}"
    TICKET=$(echo "$SUPPORT_RESULT" | grep -oP 'TICKET_\w+' | head -1)
    [ ! -z "$TICKET" ] && echo "Ticket Number: $TICKET"
else
    echo -e "${RED}❌ Support form: FAILED${NC}"
    echo "Response: ${SUPPORT_RESULT:0:200}"
fi

echo ""

# Test Partner Program Form
echo -e "${YELLOW}3. Testing Partner Program Form...${NC}"
echo "----------------------------------------"

# Get CSRF token
CSRF=$(curl -s http://localhost:8080/partner-program | grep -oP 'name="csrf_test_name"\s+value="\K[^"]+' | head -1)
echo "CSRF Token: ${CSRF:0:20}..."

# Submit partner form
PARTNER_DATA="businessName=Tech+Solutions+Inc&\
registrationNumber=REG2024001&\
countryBusiness=South+Africa&\
contactName=Mike+Johnson&\
contactEmail=partner@techsolutions.com&\
contactPhone=%2B27987654321&\
Skype_Teams=mike.johnson&\
question1=5-10+Million&\
question2=Yes&\
question3=Technology&\
question4=Reseller&\
solutions%5B%5D=NU+SIP&\
solutions%5B%5D=NU+SMS&\
solutions%5B%5D=NU+CRON&\
question6=We+have+an+established+sales+team+and+marketing+department&\
question7=Our+target+market+includes+enterprise+and+SMB+companies&\
form_start_time=$(($(date +%s) - 10))&\
form_token=test_$(date +%s)"

if [ ! -z "$CSRF" ]; then
    PARTNER_DATA="${PARTNER_DATA}&csrf_test_name=${CSRF}"
fi

PARTNER_RESULT=$(curl -s -L -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -H "User-Agent: Mozilla/5.0" \
  -H "Accept: application/json" \
  -d "$PARTNER_DATA" \
  http://localhost:8080/submit_partner_form 2>&1)

if echo "$PARTNER_RESULT" | grep -q '"status":"success"'; then
    echo -e "${GREEN}✅ Partner form: PASSED${NC}"
    REFERENCE=$(echo "$PARTNER_RESULT" | grep -oP '"reference":"\K[^"]+')
    [ ! -z "$REFERENCE" ] && echo "Reference: $REFERENCE"
elif echo "$PARTNER_RESULT" | grep -q "Too many requests"; then
    echo -e "${YELLOW}⚠️  Partner form: RATE LIMITED (try again in 60 seconds)${NC}"
else
    echo -e "${RED}❌ Partner form: FAILED${NC}"
    echo "Response: ${PARTNER_RESULT:0:200}"
fi

echo ""
echo "==========================================
Summary
==========================================
"

# Check database
echo -e "${YELLOW}Database Status:${NC}"
DB_CHECK=$(docker exec nugui-db mysql -uroot -psecure_root_password_change_me nugui_website -e "SELECT COUNT(*) as count FROM partners;" 2>&1 | grep -v Warning | tail -1)
if [ ! -z "$DB_CHECK" ]; then
    echo -e "${GREEN}✅ Partners table exists${NC}"
    echo "   Records in database: $DB_CHECK"
else
    echo -e "${RED}❌ Database issue${NC}"
fi

echo ""
echo "Test completed at: $(date)"