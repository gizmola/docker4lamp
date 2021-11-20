FROM golang:1.17.3-alpine3.14
RUN cd /go && \
    apk add git && \
    git clone https://github.com/FiloSottile/mkcert && \
    cd mkcert && \
    go build -ldflags "-X main.Version=$(git describe --tags)"   
WORKDIR /root/.local/share/mkcert
CMD /go/mkcert/mkcert -install && for i in $(echo $domain | sed "s/,/ /g"); do /go/mkcert/mkcert $i; done && tail -f -n0 /etc/hosts