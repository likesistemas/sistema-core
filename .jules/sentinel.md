## 2024-05-06 - Sentinel Journal

**Vulnerability:** Information Disclosure via Error Messages (`var_dump($config)`)
**Learning:** In PHP, `var_dump()` is often used for debugging, but if left in production code (especially error handling paths), it can expose sensitive variables to users or attackers. In this case, it was dumping the `$config` variable, which contains sensitive database credentials, AWS keys, and email passwords when a validation error occurs.
**Prevention:** Always review debugging statements like `var_dump()`, `print_r()`, or `console.log()` before committing. Error messages should be generic and not leak internal state or configuration.
