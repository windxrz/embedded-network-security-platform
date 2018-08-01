#include "mraa.h"
#include <stdio.h>
#include <unistd.h>

int main()
{
        int i=0;
        int j=0;
        mraa_init();
        mraa_gpio_context pin78 = mraa_gpio_init(52);
        mraa_gpio_dir(pin78, MRAA_GPIO_OUT_HIGH);
        mraa_gpio_context pin79 = mraa_gpio_init(53);
        mraa_gpio_dir(pin79, MRAA_GPIO_OUT_HIGH);
        mraa_gpio_context pin80 = mraa_gpio_init(54);
        mraa_gpio_dir(pin80, MRAA_GPIO_OUT_HIGH);
        mraa_gpio_context pin81 = mraa_gpio_init(55);
        mraa_gpio_dir(pin81, MRAA_GPIO_OUT_HIGH);
        for (i=0;i<2;i++){
                mraa_gpio_write(pin79,0);
                mraa_gpio_write(pin80,0);
                mraa_gpio_write(pin81,0);
                for (j=0;j<1000;j++)
                {
                        mraa_gpio_write(pin78,0);
                        usleep(100);
                        mraa_gpio_write(pin78,1);
                        usleep(100);
                }
                mraa_gpio_write(pin79,1);
                mraa_gpio_write(pin80,1);
                mraa_gpio_write(pin81,1);
                for (j=0;j<1000;j++)
                {
                        mraa_gpio_write(pin78,0);
                        usleep(100);
                        mraa_gpio_write(pin78,1);
                        usleep(100);
                }
        }
        mraa_gpio_write(pin78,0);
        mraa_gpio_write(pin79,1);
        mraa_gpio_write(pin80,0);
        mraa_gpio_write(pin81,0);
        return MRAA_SUCCESS;
}