FROM python:latest

COPY . .

EXPOSE 8000

ENTRYPOINT ["python","-m","http.server"]
