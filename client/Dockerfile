FROM node:latest
RUN npm global add @vue/cli
RUN npm global add @vue/cli-init
WORKDIR /var/www
COPY package.json ./
RUN npm install
COPY . .
RUN npm run build
EXPOSE 3000
CMD ["npm", "run","dev"]