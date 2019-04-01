---
layout: default
title: kirki_config
published: true
mainMaxWidth: 55rem;
---


The `kirki_config` argument is used internally to assign a configuration to your fields.

You don't have to manually set it since it's automatically set when you create your field.

Example:

```php
Kirki::add_field( 'my_config', [
    'type'        => 'text',
    'settings'    => 'my_setting',
    'label'       => esc_html__( 'Text Control', 'my_textdomain' ),
    'section'     => 'my_section',
    'default'     => esc_html__( 'This is a default value', 'my_textdomain' ),
    'priority'    => 10,
] );
```

In the above example, the `kirki_config` argument is automatically set to `my_config`.
