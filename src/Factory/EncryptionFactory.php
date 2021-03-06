<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/14
 * Time: 10:44
 */
namespace HuNanZai\Component\Pay\Package\Alipay_wap\Factory;

use HuNanZai\Component\Pay\Package\Alipay_wap\Config;
use HuNanZai\Component\Pay\Package\Alipay_wap\Encryption\IEncryption;
use HuNanZai\Component\Pay\Package\Alipay_wap\Encryption\Md5Encryption;
use HuNanZai\Component\Pay\Package\Alipay_wap\Encryption\RsaEncryption;

class EncryptionFactory
{
    const ENC_TYPE_RSA  = 'RSA';
    const ENC_TYPE_MD5  = 'MD5';

    /**
     * 获取一个加密的类
     *
     * @param      Config $config    //支付宝的配置
     * @return     IEncryption
     */
    public static function create($config)
    {
        switch (strtoupper($config->sign_type)) {
            case self::ENC_TYPE_RSA:
                return new RsaEncryption($config->private_key_path, $config->public_key_path);
            case self::ENC_TYPE_MD5:
                return new Md5Encryption($config->key);
            default:
                return null;
        }
    }
}
