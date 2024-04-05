FROM composer:latest as composer

FROM php:8.2 as base
WORKDIR /app
RUN apt update \
    && apt install -yf git curl
COPY bin/executor /app/task_executor
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENTRYPOINT ["/bin/bash"]
CMD ["/app/task_executor"]
