# Dockerfile

FROM php:8.2-fpm

ENV PUPPETEER_CACHE_DIR=${HOME}/.cache/puppeteer

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    chromium \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    poppler-utils \
    # Chrome dependencies
    gnupg2 \
    ca-certificates \
    fonts-liberation \
    libasound2 \
    libatk-bridge2.0-0 \
    libatk1.0-0 \
    libcups2 \
    libdbus-1-3 \
    libdrm2 \
    libgbm1 \
    libgtk-3-0 \
    libnspr4 \
    libnss3 \
    libx11-6 \
    libx11-xcb1 \
    libxcb1 \
    libxcomposite1 \
    libxcursor1 \
    libxdamage1 \
    libxext6 \
    libxfixes3 \
    libxi6 \
    libxrandr2 \
    libxrender1 \
    libxss1 \
    libxtst6 \
    xdg-utils \
    # Node.js setup
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    # # Global install Puppeteer (will pull headless Chromium)
    # && npm install -g puppeteer \
    && rm -rf /var/lib/apt/lists/*

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 4️⃣ Prepare Puppeteer cache folder
RUN mkdir -p /var/www/.cache/puppeteer \
  && chown -R www-data:www-data /var/www/.cache

# Global install Puppeteer (will pull headless Chromium)
RUN npm install -g puppeteer

# 5️⃣ Force-download Chromium into PUPPETEER_CACHE_DIR
RUN npx puppeteer install

# 6️⃣ Copy package files & install any local JS deps
COPY package.json package-lock.json ./
RUN npm install --no-audit --no-fund

# 5. Copy existing application code
COPY . /var/www

# 6. Install app dependencies
RUN composer install --optimize-autoloader --no-dev

# 7. Generate optimized files (optional)
RUN php artisan key:generate \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan storage:link

# 🔟 Fix permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/.cache

# Copy Puppeteer’s Chrome out of /root into /usr/bin
# RUN CHROME_DIR=$(ls -d /root/.cache/puppeteer/chrome/*) \
#  && cp $CHROME_DIR/chrome-linux64/chrome /usr/bin/google-chrome \
#  && chmod +x /usr/bin/google-chrome

# 9. Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
