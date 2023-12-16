# qbittorrent_service

> qbittorrent的grpc服务封装,


## 为啥只有用户鉴权

> 因为我的项目需要用户鉴权,所以就只写了用户鉴权,其他鉴权可以自己写

> 这是服务,不是应用,各位别写的太复杂了


## Grpc

```bash
protoc --php_out=grpc/ proto/grpc.proto

`grpcurl  -import-path ../protos   -proto  greet.proto -d {\"name\":\"World\"} localhost:5001 greet.Greeter/SayHello`

grpcurl  -import-path ./proto -plaintext  -proto grpc.proto -d {\"name\":\"World\"} 127.0.0.1:9503 grpc.hi/SayHello

grpcurl -plaintext  -proto ./proto/grpc.proto  127.0.0.1:9503 list


grpcurl -plaintext  -proto ./proto/grpc.proto  127.0.0.1:9503 grpc.hi/sayHello

docker run -v $(pwd):/proto  fullstorydev/grpcurl hyperf3:9503 list 

```