<?php
/**
 * Copyright 2010-12 Nickolas Whiting. All rights reserved.
 * Use of this source code is governed by the Apache 2 license
 * that can be found in the LICENSE file.
 */

/**
 * Returns the XPSPL processor.
 * 
 * @return  object  XPSPL\Processor
 */
function XPSPL()
{
    return XPSPL::instance();
}