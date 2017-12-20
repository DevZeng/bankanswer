<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => '2017050307095529',

        // 支付宝异步通知地址
        'notify_url' => '',

        // 支付成功后同步通知地址
        'return_url' => '',

        // 阿里公共密钥，验证签名时使用
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgiFHhMqtbzOeIL55Xv0So5KwIIO8xAXCXwDDknlD8C4L8Fff1SmMSD3bmU5tZbyNDdcQYYkRfBbjN6yk3tnTv9kRRtAl6Gn1GOx47TZW3J28fN15hAUUMAh3c4ZgClC353T1k9J6MZ8agB2F55LSpoytcDnx6Q2UA318VNDJZWLdsoUu7VaFH0tm1f4+hHibHywnS82zursViyNWu54lOjGUXjAU2xW6DKFmXgtzIjwpNtExjgMaRiYqmzKcBzeZwD8sAmxiBxgMal5XZ0uDmdzR62ef4iSatl+7IH5NE0s2hFNlVo/dmauUvbupI06jT4zCle8JEiwPfCVfQHF11QIDAQAB',

        // 自己的私钥，签名时使用
        'private_key' => 'MIIEpAIBAAKCAQEA8c246hliC2aTLPYCbxFM+Jsd5ZR0Ig09TZBA05V9oR9TU+pOgmjJGTNvyCFq7B6qp0tIWYnmCo49Gw4ii4hYI175IVlepW9qpUV4jYVbIIrf7ycATNuf6jUHfxMEfbW6s49G0fzgEkL35W1mpAE/PqxeKUrtgUdmeHul1htEoOpSMgOGSz0goxl8Nny7wbw69JmNxL4ia3sePHDjBgWhnRy2nYCgF0ceGHNA901zN7Yh1sL6UXq/eHUUa/TzN71/Cd4ZQ9gGlM5w+/fbxK+T605Bc7EeWmOAtZ+tdNUx9X41aZrlywa3U5KJJxjwt85aJ6d46LEsWv1jQTM4qRFjmwIDAQABAoIBAQCbL+omrIXFRV7ds0HaoKLix0MHziA+nnqiphtE8COB3gXvzGf4wGGYP+/U5MWnpwLlfaaAeMVgLuu+ynKXVLkkcla39ZCN4pTyX0TApz7WAus3pLNHoIjgmoomH0F5oMGjbigIqx/v+HT7FRyT040QnzWLkOAfYYC9gLXtVPDVyG39EDy37iNsZDN963uRDpK4COcnd1JI1ViUkfwZvujOI7DAWrcyE2P/aG40f+VAA6kxorVVGuSnlKC2xcaNW9uAIpoRAbF+NlWPdcWGX+MuYsUYKkAFWfWns6ZXJuU5ymmk1RTyoXiBnPBm5X0KW5rhVBBHKmkfF9w7wvb6d33BAoGBAPoLD0NZA2mhOXNnpFL/7ZQCF52p4PZ8ER99nqFt7W+8z/cRcPo3wKkqagrvGzZc8/lpemQNKYy1pgRxzzf/Fwfj5n39lRdkLRYNMw45+qIiQQR+azSgGoQIf2d1yceu6UsGAVUUIr28JrcKx590KxWzE+URUtINekq7o0lkLgHhAoGBAPeQaWt/tGPh1SDXqilrMNuHsx1nXGpWjnAcdQVMPVri0phKIWLuHFolEprPn1/boqpmbkxqZ4yLbU6V4hdZrCzh0sIdOOtOsron2FDkORnkn5a28LCrjNBVNMjJwCqsvO5Wb8iTvr/trlUzUZ211smNmqVt+Oi0A2OU3LwBvwz7AoGAHx4ZPCxrvE2QNMiFLr8i9fR8s+ZcVNCD4QNlJnnjvrAkwX6uLLWbiHH62HmBTXar9jImRSVOMnC4xHzVaQaZ+yVlnfBdCZgx9DiYTgDxLBRPOxvwg5AZPK1CDcIe5nbiGbAZoljrKemsd8MjrLhsVDsBEtThFbsPqRVI8O1CvIECgYBunpS8eB++0dZOCo/6We9G6OfcJ6dfzLVw2wZfC6YOynOXoOgyMHtyvEYH7uYkCxwwT/zRIGqMnnCFQOv5yxPoKi/mlPAuFMg/7jX2T0REkafNzIjYKI+PN8OSRLQdXXo+dVkVow8E68uOPpQliG8lOKT1bqJeOLGa+ZV4XL9lqQKBgQCeSsehuyOQ76TDqHgU/ZTOfq8ydb0qdIQNAx8MZ3BX0IaPZnssZtbiSZnECPtPdnrcHro8UMq14Ki/+1+UvfrJuDnqRJzsAYGJGtQTxZQUZJHmilTR3tZa0ZdBUKKTqSBlyTlWg0MK9h1FDqxvxLVjpFtG3nGQNCL9mRzeE8qiQw==',
    ],

    'wechat' => [
        // 公众号APPID
        'app_id' => '',

        // 小程序APPID
        'miniapp_id' => '',

        // APP 引用的 appid
        'appid' => '',

        // 微信支付分配的微信商户号
        'mch_id' => '',

        // 微信支付异步通知地址
        'notify_url' => '',

        // 微信支付签名秘钥
        'key' => '',

        // 客户端证书路径，退款时需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款时需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',
    ],
];
