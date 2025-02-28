FROM node:latest

WORKDIR /app

COPY ./nodejs/esport-api/package.json /app
RUN npm install

COPY ./nodejs/esport-api /app
EXPOSE 3000

CMD ["npm", "start"]